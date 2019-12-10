<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('categories');
		
		Schema::create('categories', function(Blueprint $table)
		{
			$table->char('id', 32);
			$table->char('parent_id', 32)->nullable();
			$table->text('description', 65535)->nullable();
			$table->string('name', 65535);
			$table->string('image_id', 32)->nullable();
			$table->string('updated_by', 32)->nullable();
			$table->string('created_by', 32)->nullable();
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
		Schema::dropIfExists('categories');
	}

}
