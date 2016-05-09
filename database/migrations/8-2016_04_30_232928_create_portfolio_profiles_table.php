<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortfolioProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('portfolio_profiles', function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned()->primary();
			$table->string('firstName', 48)->nullable();
			$table->string('lastName', 48)->nullable();
			$table->text('aboutMe', 65535)->nullable();
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
        
		Schema::drop('portfolio_profiles');
	}

}
