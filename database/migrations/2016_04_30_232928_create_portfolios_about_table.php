<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortfoliosAboutTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('portfolios_about', function(Blueprint $table)
		{
			$table->integer('user_id')->primary();
			$table->text('overview', 65535)->nullable();
			$table->timestamps();
		});

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
        
		Schema::drop('portfolios_about');
	}

}
