<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Redirect;
use Session;
use Socialite;
use URL;

class SocialAuthController extends Controller {
	/**
	 * Chuyển hướng người dùng sang OAuth Provider.
	 *
	 * @return Response
	 */
	public function redirectToProvider($provider) {
		if (!Session::has('pre_url')) {
			Session::put('pre_url', URL::previous());
		} else {
			if (URL::previous() != URL::to('login')) {
				Session::put('pre_url', URL::previous());
			}

		}
		return Socialite::driver($provider)->redirect();
	}

	/**
	 * Lấy thông tin từ Provider, kiểm tra nếu người dùng đã tồn tại trong CSDL
	 * thì đăng nhập, ngược lại nếu chưa thì tạo người dùng mới trong SCDL.
	 *
	 * @return Response
	 */
	public function handleProviderCallback($provider) {
		$user = Socialite::driver($provider)->user();

		$authUser = $this->findOrCreateUser($user, $provider);
		Auth::login($authUser, true);
		return redirect('user/profile');
	}

	/**
	 * @param  $user Socialite user object
	 * @param $provider Social auth provider
	 * @return  User
	 */
	public function findOrCreateUser($user, $provider) {
		$authUser = User::where('provider_id', $user->id)->first();
		if ($authUser) {
			return $authUser;
		}

		$newuser = new User;
		$newuser->fullname = $user->name;
		$newuser->email = $user->email;
		$newuser->image = $user->avatar;
		$newuser->phone = "";
		$newuser->address = "";
		$newuser->provider = $provider;
		$newuser->provider_id = $user->id;
		$newuser->level = 2;
		$newuser->save();
		return $newuser;
	}
}