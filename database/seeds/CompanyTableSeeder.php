<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Company::create([
			'name'=>'SomeName company Ltd',
			'street'=>'Somewhere in the world out there',
			'city'=>'No where land',
			'country'=>'Earth',
			'phone'=>'01052364789',
			'email'=>'justarandomeamil@gmail.com',
			'logo'=>'somefile'
		]);
    }
}
