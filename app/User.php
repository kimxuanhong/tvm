<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
	use Notifiable;

	protected $table = "users";

	protected $fillable = ['fullname', 'email', 'provider', 'provider_id', 'phone', 'address'];

	protected $hidden = [
		'password', 'remember_token',
	];

	public function motel() {
		return $this->hasMany('App\Motel', 'user_id', 'id');
	}
}
