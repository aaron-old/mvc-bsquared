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
			$table->integer('user_id')->default(0);
			$table->integer('works_id')->default(0);
			$table->string('title', 48)->nullable();
			$table->text('project_description', 65535)->nullable();
			$table->string('work_link', 512)->nullable();
			$table->timestamps();
			$table->unique(['user_id','works_id']);
		});

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
		
		Schema::drop('portfolio_works');
	}

}
