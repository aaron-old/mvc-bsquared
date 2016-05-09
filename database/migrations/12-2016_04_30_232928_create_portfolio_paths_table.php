<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortfolioPathsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_portfolio_paths', function(Blueprint $table)
		{
			$table->integer('path_id');
			$table->integer('user_id')->unsigned()->index();
			$table->string('path', 256)->nullable();
			$table->integer('destination_id');
			$table->timestamps();
			$table->unique(['path_id','user_id']);
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
        
		Schema::drop('user_portfolio_paths');
	}

}
