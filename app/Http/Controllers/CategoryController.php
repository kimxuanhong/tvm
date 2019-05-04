<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
	public function getlist() {
		$category = Category::all();
		return view('admin.category.list', ['categorys' => $category]);
	}

	public function getadd() {
		return view('admin.category.add');
	}

	public function postadd(Request $request) {
		$this->validate($request,
			[
				'name' => 'required|min:3|max:100',
			],
			[
				'name.required' => 'Chưa nhập tên loại nhà trọ',
				'name.min' => 'Tên loại nhà trọ phải có độ dài từ 3 đến 100',
				'name.max' => 'Tên loại nhà trọ phải có độ dài từ 3 đến 100',
			]);

		$category = new Category;
		$category->name = $request->name;
		$category->slug = changeTitle($request->name);
		$category->kind = $request->category;
		$category->save();

		return redirect('admin/category/list')->with('success', 'Thêm thành công');
	}

	public function getedit($id) {
		$category = Category::find($id);
		return view('admin.category.edit', ['category' => $category]);
	}

	public function postedit(Request $request, $id) {
		$category = Category::find($id);
		$request->validate(
			[
				'name' => 'required|min:3|max:100',
			],
			[
				'name.required' => 'Chưa nhập tên loại nhà trọ',
				'name.unique' => 'Tên loại nhà trọ đã tồn tại',
				'name.min' => 'Tên loại nhà trọ phải có độ dài từ 3 đến 100',
				'name.max' => 'Tên loại nhà trọ phải có độ dài từ 3 đến 100',
			]);

		$category->name = $request->name;
		$category->slug = changeTitle($request->name);
		$category->kind = $request->category;
		$category->save();

		return redirect('admin/category/edit/' . $category->id)->with('success', 'Sửa thành công');
	}

	public function enable($id) {
		$category = Category::find($id);
		$category->kind = $category->kind - 10;
		$category->save();
		return redirect('admin/category/list')->with('success', 'Đã cho phép khôi phục');
	}

	public function disable($id) {
		$category = Category::find($id);
		$category->kind = $category->kind + 10;
		$category->save();
		return redirect('admin/category/list')->with('success', ' Đã tạm ngưng');
	}
}
