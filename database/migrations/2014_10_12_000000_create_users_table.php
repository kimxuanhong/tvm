<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->text('fullname');
			$table->text('image');
			$table->string('email')->unique();
			$table->string('phone');
			$table->integer('sex')->default(1);
			$table->date('birthday')->default('1997-02-01');
			$table->text('address');
			$table->integer('level')->unsigned()->default(2);
			$table->string('provider');
			$table->string('provider_id');
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('users');
	}
}
