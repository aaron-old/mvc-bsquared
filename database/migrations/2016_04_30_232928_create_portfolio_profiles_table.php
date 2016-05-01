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
			$table->integer('user_id', true);
			$table->string('firstName', 48)->nullable();
			$table->string('lastName', 48)->nullable();
			$table->text('aboutMe', 65535)->nullable();
			$table->timestamps();
		});

		Schema::table('portfolio_profiles', function(Blueprint $table)
		{
			$table->foreign('user_id', 'portfolio_profiles_portfolio_members_userId_fk')->references('user_id')->on('portfolio_members')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('portfolio_profiles', function(Blueprint $table)
        {
            $table->dropForeign('portfolio_profiles_portfolio_members_userId_fk');
        });
        
		Schema::drop('portfolio_profiles');
	}

}
