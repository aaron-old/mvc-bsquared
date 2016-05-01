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
			$table->integer('user_id')->primary();
			$table->text('statement', 65535)->nullable();
			$table->timestamps();
		});

		Schema::table('portfolios_statement', function(Blueprint $table)
		{
			$table->foreign('user_id', 'portfolios_statement_portfolio_members_userId_fk')
				->references('user_id')
				->on('portfolio_members')
				->onUpdate('RESTRICT')
				->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('portfolios_statement', function(Blueprint $table)
		{
			$table->dropForeign('portfolios_statement_portfolio_members_userId_fk');
		});
		
		Schema::drop('portfolios_statement');
	}

}
