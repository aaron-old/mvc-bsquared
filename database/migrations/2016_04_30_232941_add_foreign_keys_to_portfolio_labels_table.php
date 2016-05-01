<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPortfolioLabelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('portfolio_labels', function(Blueprint $table)
		{
			$table->foreign('user_id', 'portfolio_labels_portfolio_members_userId_fk')->references('user_id')->on('portfolio_members')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('portfolio_labels', function(Blueprint $table)
		{
			$table->dropForeign('portfolio_labels_portfolio_members_userId_fk');
		});
	}

}
