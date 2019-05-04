<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserMiddleware {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		if (Auth::check()) {
			$user = Auth::user();
			if ($user->level <= 2) {
				return $next($request);
			} else {
				return redirect('user/login')->with('thongbao', 'Vui lòng đăng nhập quyền cộng tác viên');
			}

		} else {
			return redirect('user/login')->with('thongbao', 'Bạn chưa đăng nhập');
		}
	}
}
