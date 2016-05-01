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
			$table->integer('column_id', true);
			$table->integer('user_id');
			$table->text('column_text', 65535)->nullable();
			$table->integer('destination_id')->nullable()->index('destination_id');
			$table->timestamps();
			$table->unique(['user_id','column_id']);
		});

		Schema::table('portfolio_columns', function(Blueprint $table)
		{
			$table->foreign('user_id', 'portfolio_columns_portfolio_members_userId_fk')->references('user_id')->on('portfolio_members')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('portfolio_columns', function(Blueprint $table)
        {
            $table->dropForeign('portfolio_columns_portfolio_members_userId_fk');
        });
        
		Schema::drop('portfolio_columns');
	}

}
