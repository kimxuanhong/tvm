<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('posts', function (Blueprint $table) {
			$table->increments('id');
			$table->text('title');
			$table->text('slug');
			$table->text('keyword');
			$table->longText('content');
			$table->string('image')->default('no_image.png');
			$table->integer('level')->default(0);
			$table->integer('view')->default(0);
			$table->integer('motel_id')->unsigned();
			$table->foreign('motel_id')->references('id')->on('motels')->onDelete('cascade');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('posts');
	}
}
