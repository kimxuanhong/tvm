<?php

namespace App\Http\Middleware;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware {
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
			if ($user->level == 1) {
				return $next($request);
			} else {
				return redirect('user/login')->with('thongbao', 'Vui lòng đăng nhập quyền Quản trị viên');
			}

		} else {
			return redirect('user/login')->with('thongbao', 'Bạn chưa đăng nhập');
		}
	}
}
