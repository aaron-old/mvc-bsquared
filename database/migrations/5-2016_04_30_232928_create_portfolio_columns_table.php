<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortfolioColumnsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('portfolio_columns', function(Blueprint $table)
		{
			$table->integer('column_id');
			$table->integer('user_id')->unsigned()->index();
			$table->text('column_text', 65535)->nullable();
			$table->integer('destination_id')->nullable()->index('destination_id');
			$table->timestamps();
			$table->unique(['user_id','column_id']);
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
		Schema::drop('portfolio_columns');
	}

}
