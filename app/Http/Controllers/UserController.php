<?php

namespace App\Http\Controllers;
use App\Category;
use App\Motel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

	public function getList() {
		$user = user::all();
		return view('admin.user.list', ['users' => $user]);
	}

	public function getLogin() {
		$category = Category::all();
		return view('site.login', ['categorys' => $category]);
	}

	public function postLogin(Request $request) {
		$request->validate([
			'username' => 'required',
			'password' => 'required',

		], [
			'username.required' => 'Vui lòng nhập tài khoản',
			'password.required' => 'Vui lòng nhập mật khẩu',

		]);

		if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
			return redirect('user/profile');
		} else {
			return redirect('user/login')->with('success', 'Tài khoản hoặc mật khẩu không đúng');
		}
	}

	public function getRegister() {
		$category = Category::all();
		return view('site.register', ['categorys' => $category]);
	}

	public function postRegister(Request $request) {

		$request->validate([
			'username' => 'required|unique:users,username',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|min:6',
			'repassword' => 'required|same:password',
			'fullname' => 'required',
			'address' => 'required',
		], [
			'$username.required' => 'Vui lòng nhập tài khoản',
			'$username.unique' => 'Tài khoản đã tồn tại trên hệ thống',
			'email.unique' => 'Email đã tồn tại trên hệ thống',
			'email.required' => 'Vui lòng nhập Email',
			'password.required' => 'Vui lòng nhập mật khẩu',
			'password.min' => 'Mật khẩu phải lớn hơn 6 kí tự',
			'repassword.required' => 'Vui lòng nhập lại mật khẩu',
			'repassword.same' => 'Mật khẩu nhập lại không trùng khớp',
			'fullname.required' => 'Bạn chưa nhập tên',
			'address.required' => 'Bạn chưa nhập địa chỉ',
		]);
		$newuser = new User;
		$newuser->username = $request->username;
		$newuser->fullname = $request->fullname;
		$newuser->phone = $request->phone;
		$newuser->address = $request->address;
		$newuser->password = bcrypt($request->password);
		$newuser->email = $request->email;
		$newuser->image = 'no-avatar.png';
		$newuser->save();
		auth()->login($newuser);
		return redirect('/user/profile')->with('success', 'Đăng kí thành công');
	}

	public function logout() {
		Auth::logout();
		return redirect('trang-chu.html');
	}

	public function getProfile() {
		$mypost = Motel::where('user_id', Auth::user()->id)->get();
		$category = Category::all();
		return view('site.profile', [
			'categorys' => $category,
			'mypost' => $mypost,
		]);
	}

	public function getEditprofile() {
		$user = User::find(Auth::user()->id);
		$category = Category::all();
		return view('site.editprofile', [
			'categorys' => $category,
			'user' => $user,
		]);
	}
	public function postEditprofile(Request $request) {
		$category = Category::all();
		$user = User::find(Auth::id());
		if ($request->hasFile('avtuser')) {
			$file = $request->file('avtuser');
			var_dump($file);
			$exten = $file->getClientOriginalExtension();
			if ($exten != 'jpg' && $exten != 'png' && $exten != 'jpeg' && $exten != 'JPG' && $exten != 'PNG' && $exten != 'JPEG') {
				return redirect('user/profile/edit')->with('thongbao', 'Bạn chỉ được upload hình ảnh có định dạng JPG,JPEG hoặc PNG');
			}

			$Hinh = 'avatar-' . $user->username . '-' . time() . '.' . $exten;
			while (file_exists('uploads/avatars/' . $Hinh)) {
				$Hinh = 'avatar-' . $user->username . '-' . time() . '.' . $exten;
			}
			if (file_exists('uploads/avatars/' . $user->avatar)) {
				unlink('uploads/avatars/' . $user->avatar);
			}

			$file->move('uploads/avatars', $Hinh);
			$user->avatar = $Hinh;
		}
		$this->validate($request, [
			'txtname' => 'min:3|max:20',
		], [
			'txtname.min' => 'Tên phải lớn hơn 3 và nhỏ hơn 20 kí tự',
			'txtname.max' => 'Tên phải lớn hơn 3 và nhỏ hơn 20 kí tự',
		]);
		if (($request->txtpass != '') || ($request->retxtpass != '')) {
			$this->validate($request, [
				'txtpass' => 'min:3|max:32',
				'retxtpass' => 'same:txtpass',
			], [
				'txtpass.min' => 'password phải lớn hơn 3 và nhỏ hơn 32 kí tự',
				'txtpass.max' => 'password phải lớn hơn 3 và nhỏ hơn 32 kí tự',
				'retxtpass.same' => 'Nhập lại mật khẩu không đúng',
				'retxtpass.required' => 'Vui lòng nhập lại mật khẩu',
			]);
			$user->password = bcrypt($request->txtpass);
		}

		$user->name = $request->txtname;
		$user->save();
		return redirect('user/profile/editprofile')->with('thongbao', 'Cập nhật thông tin thành công');
	}

	public function enable($id) {
		$user = User::find($id);
		$user->level = $user->level - 10;
		$user->save();
		return redirect('admin/user/list')->with('success', 'Đã cho phép khôi phục');
	}

	public function disable($id) {
		$user = User::find($id);
		$user->level = $user->level + 10;
		$user->save();
		return redirect('admin/user/list')->with('success', ' Đã tạm ngưng');
	}

	public function delete($id) {
		$user = User::find($id);
		$user->delete();
		return redirect('admin/user/list')->with('success', ' Đã tạm ngưng');
	}
}
