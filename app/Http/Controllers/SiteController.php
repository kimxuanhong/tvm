<?php

namespace App\Http\Controllers;
use App\Category;
use App\Motel;
use Illuminate\Http\Request;

class SiteController extends Controller {

	public function category($slug = 'nha-tro-sinh-vien') {
		$category = Category::Where('slug', $slug)->first();
		$motel_view = Motel::Where('category_id', $category->id)->orderBy('view', 'desc')->take(3)->get();
		$motel_new = Motel::Where('category_id', $category->id)->orderBy('created_at', 'desc')->take(3)->get();
		$motel_price = Motel::Where('category_id', $category->id)->orderBy('price', 'asc')->take(3)->get();
		$motel_recomend = Motel::Where('category_id', $category->id)->orderBy('created_at', 'desc')->take(6)->get();
		return view('site.category',
			[
				'motel_views' => $motel_view,
				'motel_news' => $motel_new,
				'motel_prices' => $motel_price,
				'motel_recomends' => $motel_recomend,
				'category' => $category,
			]);
	}

	public function categoryajax(Request $request) {
		$motel = Category::Where('slug', $request->slug)->first();
		return view('site.categoryajax', ['motels' => $motel]);
	}

	public function detail($slug, $motel) {
		$motel = Motel::Where('slug', $motel)->first();
		$motel->view = $motel->view + 1;
		$motel->save();

		$motels = Motel::Where('category_id', $motel->category_id)
			->Where('id', '<>', $motel->id)
			->orderBy('view', 'desc')->take(3)->get();
		return view('site.detail',
			[
				'motel' => $motel,
				'motels' => $motels,
			]);
	}

	public function trangchu() {
		$motel_view = Motel::orderBy('view', 'desc')->take(3)->get();
		$motel_new = Motel::orderBy('created_at', 'desc')->take(3)->get();
		$motel_price = Motel::orderBy('price', 'asc')->take(3)->get();
		$motel_recomend = Motel::orderBy('created_at', 'desc')->take(6)->get();
		return view('site.index',
			[
				'motel_views' => $motel_view,
				'motel_news' => $motel_new,
				'motel_prices' => $motel_price,
				'motel_recomends' => $motel_recomend,
			]);
	}
}
