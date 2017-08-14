<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employees', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('employee_code')->nullable();
			$table->string('name')->nullable();
			$table->string('address')->nullable();
			$table->string('governorate')->nullable();
			$table->string('current_address')->nullable();
			$table->string('city')->nullable();
			$table->string('gender')->nullable();
			$table->string('marital_status')->nullable();
			$table->string('home_phone', 11)->nullable();
			$table->string('mobile', 11)->nullable();
			$table->date('date_of_birth')->nullable();
			$table->text('national_id', 16777215)->nullable();
			$table->string('certificate')->nullable();
			$table->string('university')->nullable();
			$table->date('graduation_date')->nullable();
			$table->string('post_graduate_study')->nullable();
			$table->integer('hr_job_title_id')->nullable()->index('hr_job_title_id');
			$table->string('driving_license_type')->nullable();
			$table->date('driving license_issue_date')->nullable();
			$table->date('driving_license_expiry')->nullable();
			$table->integer('sector_id')->nullable();
			$table->date('date_of_hiring')->nullable();
			$table->date('date_of_start_working')->nullable();
			$table->string(' financial_category')->nullable();
			$table->date(' financial_category_start_date')->nullable();
			$table->string('working_as')->nullable();
			$table->integer('insurance_no')->nullable();
			$table->string('military_status')->nullable();
			$table->string('working_status')->nullable();
			$table->boolean('driver')->default(0);
			$table->boolean('paramedic')->default(0);
			$table->string('notes')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('employees');
	}

}
