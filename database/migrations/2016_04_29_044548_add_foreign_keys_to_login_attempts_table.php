<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLoginAttemptsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('login_attempts', function(Blueprint $table)
		{
			$table->foreign('user_id', 'login_attempts_portfolio_members_user_id_fk')->references('user_id')->on('portfolio_members')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('login_attempts', function(Blueprint $table)
		{
			$table->dropForeign('login_attempts_portfolio_members_user_id_fk');
		});
	}

}
