<?php

namespace App\Http\Controllers;
use App\Category;
use App\Convenient;
use App\District;
use App\Motel;
use App\MotelConvenient;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MotelController extends Controller {

	public function SearchMotelAjax(Request $request) {
		if (empty($request->name)) {
			if ($request->province == 0) {
				if (empty($request->convenient)) {
					$motel = Motel::select('motels.*')
						->Where('category_id', '=', $request->category)
						->Where('price', '>=', $request->price_min)
						->Where('price', '<=', $request->price_max)
						->Where('acreage', '>=', $request->acreage_min)
						->Where('acreage', '<=', $request->acreage_max)
						->get();
				} elseif (!empty($request->convenient)) {
					$motel = Motel::select('motels.*')
						->Where('category_id', '=', $request->category)
						->Where('price', '>=', $request->price_min)
						->Where('price', '<=', $request->price_max)
						->Where('acreage', '>=', $request->acreage_min)
						->Where('acreage', '<=', $request->acreage_max)
						->whereIn('id', function ($query) use ($request) {
							$query->select('motel_id')
								->from(with(new MotelConvenient)->getTable())
								->groupBy('motel_id')
								->whereIn('convenient_id', $request->convenient)
								->havingRaw('COUNT(*) >= ' . count($request->convenient))
								->get();
						})->get();
				}
			} else {
				if ($request->district == 0 && empty($request->convenient)) {
					$motel = Province::find($request->province)
						->motel()
						->Where('category_id', '=', $request->category)
						->Where('price', '>=', $request->price_min)
						->Where('price', '<=', $request->price_max)
						->Where('acreage', '>=', $request->acreage_min)
						->Where('acreage', '<=', $request->acreage_max)
						->get();
				} elseif ($request->district == 0 && !empty($request->convenient)) {
					$motel = Province::find($request->province)
						->motel()
						->Where('category_id', '=', $request->category)
						->Where('price', '>=', $request->price_min)
						->Where('price', '<=', $request->price_max)
						->Where('acreage', '>=', $request->acreage_min)
						->Where('acreage', '<=', $request->acreage_max)
						->whereIn('motels.id', function ($query) use ($request) {
							$query->select('motel_id')
								->from(with(new MotelConvenient)->getTable())
								->groupBy('motel_id')
								->whereIn('convenient_id', $request->convenient)
								->havingRaw('COUNT(*) >= ' . count($request->convenient))
								->get();
						})
						->get();
				} elseif ($request->district != 0 && empty($request->convenient)) {
					$motel = District::find($request->district)
						->motel()
						->Where('category_id', '=', $request->category)
						->Where('price', '>=', $request->price_min)
						->Where('price', '<=', $request->price_max)
						->Where('acreage', '>=', $request->acreage_min)
						->Where('acreage', '<=', $request->acreage_max)
						->get();
				} elseif ($request->district != 0 && !empty($request->convenient)) {
					$motel = District::find($request->district)
						->motel()
						->Where('category_id', '=', $request->category)
						->Where('price', '>=', $request->price_min)
						->Where('price', '<=', $request->price_max)
						->Where('acreage', '>=', $request->acreage_min)
						->Where('acreage', '<=', $request->acreage_max)
						->whereIn('motels.id', function ($query) use ($request) {
							$query->select('motel_id')
								->from(with(new MotelConvenient)->getTable())
								->groupBy('motel_id')
								->whereIn('convenient_id', $request->convenient)
								->havingRaw('COUNT(*) >= ' . count($request->convenient))
								->get();
						})
						->get();
				}
			}
		} else {
			$motel = Motel::select('motels.*')
				->Where('category_id', '=', $request->category)
				->Where('name', 'like', '%' . $request->name . '%')
				->orWhere('address', 'like', '%' . $request->name . '%')
				->orWhere('description', 'like', '%' . $request->name . '%')
				->orWhere('slug', 'like', '%' . changeTitle($request->name) . '%')
				->get();
		}

		return view('site.product_find', ['motels' => $motel]);
	}

	public function timquanhday() {
		return view('site.find');
	}

	public function kqtimquanhday(Request $request) {
		$motel = Motel::all();
		$list = array();
		foreach ($motel as $item) {
			if (distance($item->location, $request->lat, $request->log) < (double) $request->khoangcach) {
				$list[] = $item;
			}
		}
		return view('site.find_result', ['motels' => $list]);
	}

	public function getList() {
		$motel = Motel::all();
		return view('admin.motel.list', ['motels' => $motel]);
	}

	public function getAdd() {
		return view('site.motel.add');
	}

	public function postAdd(Request $request) {

		$request->validate([
			'name' => 'required',
			'address' => 'required',
			'price' => 'required',
			'acreage' => 'required',
			'phone' => 'required',
			'room' => 'required',
			'owner' => 'required',
		],
			[
				'owner.required' => 'Nhập tên người liên hệ',
				'name.required' => 'Nhập tên nhà trọ',
				'room.required' => 'Nhập số lượng phòng',
				'address.required' => 'Nhập địa chỉ phòng trọ',
				'price.required' => 'Nhập giá thuê phòng trọ',
				'acreage.required' => 'Nhập diện tích phòng trọ',
				'phone.required' => 'Nhập SĐT chủ phòng trọ (cần liên hệ)',
				'location.required' => 'Nhập hoặc chọn địa chỉ phòng trọ trên bản đồ',

			]);

		/* Check file */
		$json_img = "";
		if ($request->hasFile('image')) {
			$arr_images = array();
			$inputfile = $request->file('image');
			foreach ($inputfile as $filehinh) {
				$namefile = "tvu-image-" . str_random(5) . "-" . $filehinh->getClientOriginalName();
				while (file_exists('uploads/images' . $namefile)) {
					$namefile = "tvu-image-" . str_random(5) . "-" . $filehinh->getClientOriginalName();
				}
				$arr_images[] = $namefile;
				$filehinh->move('uploads/images', $namefile);
			}
			$json_img = json_encode($arr_images, JSON_FORCE_OBJECT);
		} else {
			$arr_images[] = "no_image.png";
			$json_img = json_encode($arr_images, JSON_FORCE_OBJECT);
		}
		/* tiện ích*/

		/* ----*/
		/* get LatLng google map */
		$arrlatlng = array();
		$arrlatlng[] = $request->lat;
		$arrlatlng[] = $request->lng;
		$json_latlng = json_encode($arrlatlng, JSON_FORCE_OBJECT);

		/* --- */
		/* New Phòng trọ */
		$motel = new Motel;
		$motel->name = $request->name;
		$motel->slug = changeTitle($request->name);
		if (empty($request->description)) {
			$motel->description = "không có mô tả thêm về phòng trọ";
		} else {
			$motel->description = $request->description;
		}
		$motel->price = $request->price;
		$motel->acreage = $request->acreage;
		$motel->address = $request->address;
		$motel->location = $json_latlng;
		$motel->image = $json_img;
		$motel->user_id = Auth::user()->id;
		$motel->category_id = $request->category;
		$motel->district_id = $request->district;
		$motel->phone = $request->phone;
		$motel->room_total = $request->room;
		$motel->owner = $request->owner;
		$motel->save();

		// ---------
		$motel_id = Motel::Where('slug', $motel->slug)->first();

		foreach ($request->convenient as $cv) {
			$convenient = new MotelConvenient;
			$convenient->motel_id = $motel_id->id;
			$convenient->convenient_id = $cv;
			$convenient->save();
		}
		return redirect('/user/motel/add')->with('success', 'Đăng tin thành công. Vui lòng đợi Admin kiểm duyệt');
	}

	function SearchProvinceAjax(Request $request) {
		$province = District::find($request->district)->province->id;
		return json_encode($province);
	}

	public function enable($id) {
		$motel = Motel::find($id);
		$motel->status = 1;
		$motel->save();
		return redirect('admin/motel/list')->with('success', 'Đã Kích Hoạt');
	}

	public function disable($id) {
		$motel = Motel::find($id);
		$motel->status = 3;
		$motel->save();
		return redirect('admin/motel/list')->with('success', ' Tạm Khóa');
	}

	public function enable2($id) {
		$motel = Motel::find($id);
		$motel->status = 1;
		$motel->save();
		return redirect('user/profile')->with('success', 'Đã Kích Hoạt');
	}

	public function disable2($id) {
		$motel = Motel::find($id);
		$motel->status = 3;
		$motel->save();
		return redirect('user/profile')->with('success', ' Tạm Khóa');
	}

	public function delete($id) {
		$motel = Motel::find($id);
		$motel->delete();
		return redirect('admin/motel/list')->with('success', 'Đã Xóa');
	}

	public function getEdit($id) {
		$motel = Motel::find($id);
		return view('site.motel.edit',
			[
				'motel' => $motel,
			]);
	}

	public function postEdit(Request $request) {

		$request->validate([
			'name' => 'required',
			'address' => 'required',
			'price' => 'required',
			'acreage' => 'required',
			'phone' => 'required',
			'room' => 'required',
			'owner' => 'required',
		],
			[
				'owner.required' => 'Nhập tên người liên hệ',
				'name.required' => 'Nhập tên nhà trọ',
				'room.required' => 'Nhập số lượng phòng',
				'address.required' => 'Nhập địa chỉ phòng trọ',
				'price.required' => 'Nhập giá thuê phòng trọ',
				'acreage.required' => 'Nhập diện tích phòng trọ',
				'phone.required' => 'Nhập SĐT chủ phòng trọ (cần liên hệ)',
				'location.required' => 'Nhập hoặc chọn địa chỉ phòng trọ trên bản đồ',

			]);

		/* Check file */
		$json_img = "";
		if ($request->hasFile('image')) {
			$arr_images = array();
			$inputfile = $request->file('image');
			foreach ($inputfile as $filehinh) {
				$namefile = "tvu-image-" . str_random(5) . "-" . $filehinh->getClientOriginalName();
				while (file_exists('uploads/images' . $namefile)) {
					$namefile = "tvu-image-" . str_random(5) . "-" . $filehinh->getClientOriginalName();
				}
				$arr_images[] = $namefile;
				$filehinh->move('uploads/images', $namefile);
			}
			$json_img = json_encode($arr_images, JSON_FORCE_OBJECT);
		} else {
			$arr_images[] = "no_image.png";
			$json_img = json_encode($arr_images, JSON_FORCE_OBJECT);
		}
		/* tiện ích*/

		/* ----*/
		/* get LatLng google map */
		$arrlatlng = array();
		$arrlatlng[] = $request->lat;
		$arrlatlng[] = $request->lng;
		$json_latlng = json_encode($arrlatlng, JSON_FORCE_OBJECT);

		/* --- */
		/* New Phòng trọ */
		$motel = new Motel;
		$motel->name = $request->name;
		$motel->slug = changeTitle($request->name);
		$motel->description = $request->description;
		$motel->price = $request->price;
		$motel->acreage = $request->acreage;
		$motel->address = $request->address;
		$motel->location = $json_latlng;
		$motel->image = $json_img;
		$motel->user_id = Auth::user()->id;
		$motel->category_id = $request->category;
		$motel->district_id = $request->district;
		$motel->phone = $request->phone;
		$motel->room_total = $request->room;
		$motel->keyword = $request->keyword;
		$motel->owner = $request->owner;
		$motel->save();

		// ---------
		$motel_id = Motel::Where('slug', $motel->slug)->first();

		foreach ($request->convenient as $cv) {
			$convenient = new MotelConvenient;
			$convenient->motel_id = $motel_id->id;
			$convenient->convenient_id = $cv;
			$convenient->save();
		}
		return redirect('/user/motel/edit')->with('success', 'Đăng tin thành công. Vui lòng đợi Admin kiểm duyệt');
	}
}
