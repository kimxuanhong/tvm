<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model {
	protected $table = "districts";

	public function motel() {
		return $this->hasMany('App\Motel', 'district_id', 'id');
	}

	public function province() {
		return $this->belongsTo('App\Province', 'province_id', 'id');
	}
}
