<?php

namespace App\Http\Controllers;
use App\District;
use App\Province;
use Illuminate\Http\Request;

class DistrictController extends Controller {
	public function getlist() {
		$district = District::all();
		return view('admin.district.list', ['districts' => $district]);
	}

	public function getadd() {
		$province = Province::all();
		return view('admin.district.add', ['provinces' => $province]);
	}

	public function ProvinceAjax(Request $request) {

		return District::find($request->id)->province->id;
	}

	public function postadd(Request $request) {
		$this->validate($request,
			[
				'name' => 'required|min:3|max:100',
			],
			[
				'name.required' => 'Chưa nhập tên huyện',
				'name.unique' => 'Tên tỉnh đã tồn tại',
			]);

		$district = new District;
		$district->province_id = $request->province;
		$district->name = $request->name;
		$district->slug = changeTitle($request->name);
		$district->save();

		return redirect('admin/district/list')->with('success', 'Thêm thành công');
	}

	public function getedit($id) {
		$district = District::find($id);
		$province = Province::all();
		return view('admin.district.edit', ['district' => $district, 'provinces' => $province]);
	}

	public function postedit(Request $request, $id) {
		$district = District::find($id);
		$request->validate(
			[
				'name' => 'required|min:3|max:100',
			],
			[
				'name.required' => 'Chưa nhập tên huyện',
				'name.unique' => 'Tên tỉnh đã tồn tại',
			]);

		$district->name = $request->name;
		$district->province_id = $request->province;
		$district->slug = changeTitle($request->name);
		$district->save();

		return redirect('admin/district/edit/' . $district->id)->with('success', 'Sửa thành công');
	}

	public function delete($id) {
		$district = District::find($id);
		$district->delete();
		return redirect('admin/district/list')->with('success', 'Đã Xóa');
	}
}
