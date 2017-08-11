<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostTable extends Migration {

	public function up()
	{
		Schema::create('post', function(Blueprint $table) {
			$table->increments('id');
            $table->string('title');
			$table->string('slug');
			$table->text('content')->nullable();
            $table->text('file')->nullable();
            $table->text('url')->nullable();
			$table->enum('type', array('blog', 'video', 'image'));
			$table->string('lat');
			$table->string('lon');
            $table->string('location');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('post');
	}
}