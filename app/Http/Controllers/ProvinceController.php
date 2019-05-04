<?php

namespace App\Http\Controllers;
use App\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller {
	public function getlist() {
		$province = Province::all();
		return view('admin.province.list', ['provinces' => $province]);
	}

	public function getadd() {
		return view('admin.province.add');
	}

	public function postadd(Request $request) {
		$this->validate($request,
			[
				'name' => 'required|min:3|max:100',
			],
			[
				'name.required' => 'Chưa nhập tên tỉnh',
				'name.unique' => 'Tên tỉnh đã tồn tại',
			]);

		$province = new Province;
		$province->name = $request->name;
		$province->slug = changeTitle($request->name);
		$province->save();

		return redirect('admin/province/list')->with('success', 'Thêm thành công');
	}

	public function getedit($id) {
		$province = Province::find($id);
		return view('admin.province.edit', ['province' => $province]);
	}

	public function postedit(Request $request, $id) {
		$province = Province::find($id);
		$request->validate(
			[
				'name' => 'required|min:3|max:100',
			],
			[
				'name.required' => 'Chưa nhập tên tỉnh',
				'name.unique' => 'Tên tỉnh đã tồn tại',
			]);

		$province->name = $request->name;
		$province->slug = changeTitle($request->name);
		$province->save();

		return redirect('admin/province/edit/' . $province->id)->with('success', 'Sửa thành công');
	}

	public function delete($id) {
		$province = Province::find($id);
		$province->delete();
		return redirect('admin/province/list')->with('success', 'Đã Xóa');
	}

	public function view($id) {
		$province = Province::find($id);
		return view('admin.district.list', ['districts' => $province->district]);
	}
}
