<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBranchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('branches', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('sector_id')->nullable()->index();
			$table->string('branch_name')->nullable();
			$table->string('has_building')->nullable();
			$table->string('address')->nullable();
			$table->string('owner')->nullable();
			$table->string('size')->nullable();
			$table->string('communication')->nullable();
			$table->string('notes')->nullable();
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
		Schema::drop('branches');
	}

}
