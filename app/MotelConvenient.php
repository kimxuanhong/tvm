<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotelConvenient extends Model {
	protected $table = "motel_convenients";

	public function motel() {
		return $this->belongsTo('App\Motel', 'motel_id', 'id');
	}
}
