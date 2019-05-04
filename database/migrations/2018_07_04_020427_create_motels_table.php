<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotelsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('motels', function (Blueprint $table) {
			$table->increments('id');
			$table->text('name');
			$table->text('slug');
			$table->text('image');
			$table->string('phone');
			$table->text('address');
			$table->string('location');
			$table->integer('district_id')->unsigned();
			$table->foreign('district_id')->references('id')->on('districts');
			$table->double('price')->unsigned();
			$table->double('sale')->unsigned()->default(0);
			$table->integer('room_total')->unsigned();
			$table->integer('room_available')->unsigned()->default(0);
			$table->integer('view')->default(0);
			$table->double('acreage')->unsigned();
			$table->integer('status')->default(2);
			$table->text('description');
			$table->integer('category_id')->unsigned();
			$table->foreign('category_id')->references('id')->on('categorys');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->string('owner');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('motels');
	}
}
