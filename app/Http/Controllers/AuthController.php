<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
	public function redirectToProvider()
	{
		return Socialite::with('oauth')->redirect();
	}

	public function handleProviderCallback()
	{

		try {
			$user = Socialite::with('oauth')->user();
		} catch (\Exception $e) {
			return redirect('/login');
		}

		$existingUser = User::whereEmail($user['email'])->first();

		if (!$existingUser){
			$existingUser = User::create([
				'name' => $user['name'],
				'email' => $user['email'],
				'oauth_id' => $user['id'],
				'oauth_token' => $user->token,
				'oauth_refresh_token' => $user->refreshToken,
				'oauth_expires_in' => $user->expiresIn
			]);
		}

		Auth::login($existingUser, true);

		return redirect('/profile');
	}

	public function profile()
	{
		return view('profile');
	}
}
