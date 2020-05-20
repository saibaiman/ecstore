<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Socialite;
use App\User;

class OAuthLoginController extends Controller
{
	public function redirectToProvider(){
		return Socialite::driver('twitter')->redirect();
	}

	public function handleProviderCallback(){
		try {
			$twitterUser = Socialite::driver('twitter')->user();
		} catch (Exception $e) {
			return redirect('auth/twitter');
		}
		$authUser = $this->findOrCreateUser($twitterUser);
		Auth::login($authUser, true);
		return redirect()->route('home');
	}

	public function findOrCreateUser($twitterUser) {
		$authUser = User::where('twitter_id', $twitterUser->id)->first();
		if ($authUser) {
			return $authUser;
		}
		Storage::put('public/twitterImgFile', $twitterUser->avatar_original);
		$imgName = basename($twitterUser->avatar_original);
		return User::create([
			'name' => $twitterUser->name,
			'nickname' => $twitterUser->nickname,
			'access_token' => $twitterUser->token,
			'access_token_secret' => $twitterUser->tokenSecret,
			'twitter_id' => $twitterUser->id,
			'avatar' => $imgName,
			'profile' => $twitterUser['description']
		]);
	}

	public function logout(Requets $request)
	{
		return redirect('/');
	}

}
