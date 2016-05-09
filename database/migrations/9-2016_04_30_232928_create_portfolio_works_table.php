<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortfolioWorksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('portfolio_works', function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned()->index();
			$table->integer('works_id')->default(0);
			$table->string('title', 48)->nullable();
			$table->text('project_description', 65535)->nullable();
			$table->string('work_link', 512)->nullable();
			$table->timestamps();
			$table->unique(['user_id','works_id']);
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
		Schema::drop('portfolio_works');
	}

}
