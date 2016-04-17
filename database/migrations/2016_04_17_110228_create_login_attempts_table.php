<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLoginAttemptsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('login_attempts', function(Blueprint $table)
		{
			$table->integer('userId');
			$table->string('time', 30);
			$table->timestamp('created')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('modified')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->primary(['userId','time']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('login_attempts');
	}

}
