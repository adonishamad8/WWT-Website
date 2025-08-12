<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(['email' => 'admin@worldwidetravel-lb.com'], [
        	'first_name' => 'admin',
        	'last_name' => 'admin',
        	'is_superadmin' => 1,
        	'password' => bcrypt('123456')
        ]);
    }
}
