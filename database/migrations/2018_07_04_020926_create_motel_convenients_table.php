<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotelConvenientsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('motel_convenients', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('motel_id')->unsigned();
			$table->foreign('motel_id')->references('id')->on('motels')->onDelete('cascade');
			$table->integer('convenient_id')->unsigned();
			$table->foreign('convenient_id')->references('id')->on('convenients');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('motel_convenients');
	}
}
