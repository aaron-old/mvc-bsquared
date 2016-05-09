<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortfoliosStatementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('portfolio_statement', function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned()->primary();
			$table->text('statement', 65535)->nullable();
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
		Schema::drop('portfolio_statement');
	}

}
