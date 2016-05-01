<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortfolioLabelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('portfolio_labels', function(Blueprint $table)
		{
			$table->integer('label_id', true);
			$table->integer('user_id')->index('user_id');
			$table->string('label', 48)->nullable();
			$table->integer('destination_id')->nullable()->index('destination_id');
			$table->timestamps();
			$table->unique(['label_id','user_id']);
		});

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
		
		Schema::drop('portfolio_labels');
	}

}
