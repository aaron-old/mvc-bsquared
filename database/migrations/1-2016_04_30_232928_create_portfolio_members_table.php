<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortfolioMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('portfolio_members', function(Blueprint $table)
		{
			$table->integer('user_id', true);
			$table->string('username', 48);
			$table->string('email', 320);
			$table->char('password');
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
			$table->char('role', 48);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('portfolio_members');
	}

}
