<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortfolioPathsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('portfolio_paths', function(Blueprint $table)
		{
			$table->integer('path_id', true);
			$table->integer('user_id')->index('portfolio_paths_portfolio_members_userId_fk');
			$table->string('path', 256)->nullable();
			$table->integer('destination_id')->nullable()->index('destination_id');
			$table->timestamps();
			$table->unique(['path_id','user_id']);
		});

		Schema::table('portfolio_paths', function(Blueprint $table)
		{
			$table->foreign('destination_id', 'portfolio_paths_file_path_lookup_destination_id_fk')->references('destination_id')->on('file_path_lookup')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'portfolio_paths_portfolio_members_userId_fk')->references('user_id')->on('portfolio_members')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('portfolio_paths', function(Blueprint $table)
        {
            $table->dropForeign('portfolio_paths_file_path_lookup_destination_id_fk');
            $table->dropForeign('portfolio_paths_portfolio_members_userId_fk');
        });
        
		Schema::drop('portfolio_paths');
	}

}
