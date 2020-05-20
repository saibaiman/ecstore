<?php

namespace App\Http\Controllers;

use App\Http\Requests\MypageRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\ChangeMail;
use App\Email_change;
use App\User;

class MyPageEditcontroller extends Controller
{
	public function __construct()
	{
//		$this->middleware('auth:web');
	}

	public function mypageForm()
	{
		$user = Auth::user();
		$name = $user['name'];
		$email = $user['email'];
		$password = $user['password'];
		return view('auth.mypage', compact('name', 'email', 'password'));
	}

	public function mypageUpdate(Request $request)
	{
		$user_id = Auth::id();
		$user = User::Where('id', $user_id)->first();
		$newpass = Hash::make($request['password']);
		$user->email = $request['email'];
		$user->password = $newpass;
		$user->save();
		return redirect('/mypage')->with('flash_message', '変更完了しました。');
	}

	public function mypageEdit(MypageRequest $request)
	{
		$user_id = Auth::id();
		$user = User::Where('id', $user_id)->first();
		$user->name = $request->name;

		if (Hash::check($request->password, $user->password)) {
			$user->password = Hash::make($request->password);

			if (!empty($request->newpass)) {
				$user->password = Hash::make($request->newpass);
			}

			if ($request->email != $user->email) {
				$to = $request->email;
				$pre_token = Hash::make(Auth::id());
				$token = str_replace('/', '', $pre_token);
				Mail::to($to)->send(new ChangeMail($token));
				Email_change::updateOrCreate([
					'user_id' => Auth::id()
				], [
					'email' => $to,
					'token' => $token
				]);
				return redirect()->back()
					->with('flash_message', 'プロフィールを変更しました。新しいメールアドレスから認証してください');
			}
			$user->save();
		} else {
			return redirect()->back()
				->with('flash_message', 'パスワードが一致しません。');
		}

		return redirect()->back()
			->with('flash_message', 'プロフィールを変更しました。');
	}

	public function authorizeMail($token)
	{
		$change_mail = Email_change::where('token', $token)->first();

		if ($change_mail) {
			$user = User::where('id', $change_mail['user_id'])->first();
			$user->email = $change_mail->email;
			$user->save();
			$change_mail->delete();
			return redirect('/mypage')
				->with('flash_message', 'プロフィールを変更しました。');
		}
		return redirect('/mypage')
			->with('error', 'プロフィールの変更に失敗しました。');
	}
}
