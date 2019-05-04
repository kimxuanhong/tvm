<?php

namespace App\Providers;

use App\Category;
use App\Convenient;
use App\District;
use App\Province;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot() {

		// You can use Closure based composers
		// which will be used to resolve any data
		// in this case we will pass menu items from database
		View::composer('*', function ($view) {
			$view->with('categorys', Category::all())
				->with('provinces', Province::all())
				->with('districts', District::all())
				->with('convenients', Convenient::all());
		});
	}
}
