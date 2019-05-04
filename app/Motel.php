<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motel extends Model {
	protected $table = "motels";

	public function category() {
		return $this->belongsTo('App\Category', 'category_id', 'id');
	}

	public function user() {
		return $this->belongsTo('App\User', 'user_id', 'id');
	}

	public function convenient() {
		return $this->belongsToMany('App\Convenient', 'motel_convenients', 'motel_id', 'convenient_id');
	}

	public function ChuHoa() {
		echo strtoupper($this->name);
	}

	public function MC() {
		return $this->hasMany('App\MotelConvenient', 'motel_id', 'id');
	}

	public function district() {
		return $this->belongsTo('App\District', 'district_id', 'id');
	}
}
