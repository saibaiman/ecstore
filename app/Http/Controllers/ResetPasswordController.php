<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Mail\ResetPasswordURL;


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */


    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
	public function __construct()
	{
	}

	public function resetForm()
	{
		return view( 'auth.passwords.email');
	}

	public function sendResetUrl(Request $request)
	{
		$email = $request->input('email');
		$email_check = User::where('email', $email)->first();
		if ($email_check) {
			$hash1 = Hash::make($email_check['id']);
			$hash2 = str_replace('/', '', $hash1);
			$pass_limit_time = date('Y-m-d H:i:s', strtotime('+30 minute'));
			//update
			$email_check->hash = $hash2;
			$email_check->limit_time = $pass_limit_time;
			$email_check->save();
			//email 送信
			$url = 'https://procir-study.site/nagai127/laravel/procirlaravel/public/password/' . $hash2;
			Mail::to($email_check['email'])->send(new ResetPasswordURL($url));
		}
		$word = "送信しました";
		return view('auth.passwords.confirm', compact('word'));
	}

	public function newPassForm(Request $request, $id)
	{
		return view('auth.passwords.newpasswordform', compact('id'));
	}

	public function passRevision(Request $request)
	{
		$user_check = User::where('hash', $request['hash'])->first();
		$now_time = date('Y-m-d H:i:s');
		//時間制限外だった時
		if ($user_check['limit_time'] <= $now_time) {
			$word = "タイムアウトになりました。30分以内に変更してください";
		} else {
			if ($user_check['hash'] == $request['hash']){
				$password_hashed = Hash::make($request['password']);
				$user_check->password = $password_hashed;
				$user_check->hash = null;
				$user_check->save();
				$word = "変更完了しました。";
			} else {
				$word = "不正なアクセスです、再度お願いします。";
			}
		}
		return view('auth.passwords.newpasswordform', compact('word'));
	}
}
