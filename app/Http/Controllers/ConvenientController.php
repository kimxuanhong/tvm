<?php

namespace App\Http\Controllers;
use App\Convenient;
use Illuminate\Http\Request;

class ConvenientController extends Controller {
	public function getList() {
		$convenient = convenient::all();
		return view('admin.convenient.list', ['convenients' => $convenient]);
	}

	public function getadd() {
		return view('admin.convenient.add');
	}

	public function postadd(Request $request) {
		$this->validate($request,
			[
				'name' => 'required|min:3|max:100',
			],
			[
				'name.required' => 'Chưa nhập tên tiện nghi',
				'name.min' => 'Tên tiện nghi phải có độ dài từ 3 đến 100',
				'name.max' => 'Tên tiện nghi phải có độ dài từ 3 đến 100',
			]);

		$convenient = new convenient;
		$convenient->name = $request->name;
		$convenient->slug = changeTitle($request->name);
		$convenient->kind = $request->kind;
		$convenient->save();

		return redirect('admin/convenient/list')->with('success', 'Thêm thành công');
	}

	public function getedit($id) {
		$convenient = convenient::find($id);
		return view('admin.convenient.edit', ['convenient' => $convenient]);
	}

	public function postedit(Request $request, $id) {
		$convenient = convenient::find($id);
		$request->validate(
			[
				'name' => 'required|min:3|max:100',
			],
			[
				'name.required' => 'Chưa nhập tên tiện nghi',
				'name.unique' => 'Tên tiện nghi đã tồn tại',
				'name.min' => 'Tên tiện nghi phải có độ dài từ 3 đến 100',
				'name.max' => 'Tên tiện nghi phải có độ dài từ 3 đến 100',
			]);

		$convenient->name = $request->name;
		$convenient->slug = changeTitle($request->name);
		$convenient->kind = $request->convenient;
		$convenient->save();

		return redirect('admin/convenient/edit/' . $convenient->id)->with('success', 'Sửa thành công');
	}

	public function enable($id) {
		$convenient = convenient::find($id);
		$convenient->kind = $convenient->kind - 10;
		$convenient->save();
		return redirect('admin/convenient/list')->with('success', 'Đã kích hoạt');
	}

	public function disable($id) {
		$convenient = convenient::find($id);
		$convenient->kind = $convenient->kind + 10;
		$convenient->save();
		return redirect('admin/convenient/list')->with('success', ' Đã tạm ngưng');
	}
}
