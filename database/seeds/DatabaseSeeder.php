<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
            'fname' => 'Brad',
            'lname' => 'shaw',
            'email' => 'bradshaw@gmail.com',
            'password' => bcrypt('password'),
            'company' => 'Zeus',
            'address' => 'No.14, Colombo',
            'telephone' => '0778965214',
            'role' => 'admin'
        ]);

    }
    

}
