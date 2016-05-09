<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLoginAttemptsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('login_attempts', function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned()->primary();
			$table->timestamps();
			$table->foreign('user_id')->references('user_id')->on('users');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('login_attempts');
	}

}
