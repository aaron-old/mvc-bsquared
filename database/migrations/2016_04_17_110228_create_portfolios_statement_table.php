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
		Schema::create('portfolios_statement', function(Blueprint $table)
		{
			$table->integer('userID')->primary();
			$table->text('statement', 65535)->nullable();
			$table->timestamp('created')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('modified')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('portfolios_statement');
	}

}
