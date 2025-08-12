<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PersmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::updateOrCreate(['identifier' => 'users'], ['name' => 'User Management']);
		Permission::updateOrCreate(['identifier' => 'about'], ['name' => 'About Us']); 
		Permission::updateOrCreate(['identifier' => 'categories'], ['name' => 'Categories']); 
		Permission::updateOrCreate(['identifier' => 'mices'], ['name' => 'Mices']); 
		Permission::updateOrCreate(['identifier' => 'packages'], ['name' => 'Packages']); 
		Permission::updateOrCreate(['identifier' => 'reviews'], ['name' => 'Reviews']); 
		Permission::updateOrCreate(['identifier' => 'events'], ['name' => 'News & Events']); 
		Permission::updateOrCreate(['identifier' => 'sliders'], ['name' => 'Sliders']); 
		Permission::updateOrCreate(['identifier' => 'services'], ['name' => 'Services']);
    }
}