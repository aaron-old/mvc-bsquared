<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPortfolioWorksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('portfolio_works', function(Blueprint $table)
		{
			$table->foreign('user_id', 'portfolio_works_portfolio_members_user_id_fk')->references('user_id')->on('portfolio_members')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('portfolio_works', function(Blueprint $table)
		{
			$table->dropForeign('portfolio_works_portfolio_members_user_id_fk');
		});
	}

}
