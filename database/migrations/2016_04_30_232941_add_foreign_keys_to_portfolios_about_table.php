<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPortfoliosAboutTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('portfolios_about', function(Blueprint $table)
		{
			$table->foreign('user_id', 'portfolios_about_portfolio_members_userId_fk')->references('user_id')->on('portfolio_members')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('portfolios_about', function(Blueprint $table)
		{
			$table->dropForeign('portfolios_about_portfolio_members_userId_fk');
		});
	}

}
