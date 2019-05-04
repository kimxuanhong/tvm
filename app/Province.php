<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model {
	protected $table = "provinces";

	public function motel() {
		return $this->hasManyThrough(
			'App\Motel',
			'App\District',
			'province_id', // Foreign key on users table...
			'district_id', // Foreign key on posts table...
			'id', // Local key on countries table...
			'id' // Local key on users table...
		);
	}

	public function district() {
		return $this->hasMany(
			'App\District',
			'province_id',
			'id'
		);
	}
}
