<?php

use Illuminate\Database\Seeder;
use App\PortfolioMember;

class PortfolioMemberSeederTableSeeder extends Seeder {

	public function run()
	{
		factory(PortfolioMember::class, 11)->create();
	}

}
