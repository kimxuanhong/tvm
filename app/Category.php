<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	protected $table = "categorys";

	public function motel() {
		return $this->hasMany('App\Motel', 'category_id', 'id');
	}

}
