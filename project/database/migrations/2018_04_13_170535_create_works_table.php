<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('works', function (Blueprint $table) {
			$table->increments('id');    
			$table->integer('user_id')->unsigned();
			$table->integer('category_id')->unsigned();
			$table->string('title')->nullable();
			$table->text('desc')->nullable();
			$table->string('slug')->nullable();
			$table->string('uni_id')->unique()->nullable();
			$table->int('width')->nullable();
			$table->int('height')->nullable();
			$table->string('type')->nullable();
			$table->string('model')->nullable();
			$table->string('aperture')->nullable();
			$table->string('iso')->nullable();
			$table->string('focal_len')->nullable();
			$table->string('shutter_speed')->nullable();
			$table->date('taken_date')->nullable();
			$table->boolean('is_featured')->default(0);
			$table->integer('download')->default(0);
			$table->tinyint('status')->default(2);
			$table->boolean('is_active')->default(1);
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('works');
	}
}
