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
            'fname' => 'Asanka',
            'lname' => 'Abewardama',
            'email' => 'asanka@gmail.com',
            'password' => bcrypt('password'),
            'company' => 'Zeus',
            'address' => 'No.14, Colombo',
            'telephone' => '0778965214',
            'role' => 'admin'
        ]);

        DB::table('users')->insert([
            'fname' => 'Hasitha',
            'lname' => 'Kelum',
            'email' => 'hasitha@gmail.com',
            'password' => bcrypt('password'),
            'company' => 'ABC pharmacy',
            'address' => 'No.14, Califonia',
            'telephone' => '0778965214',
            'role' => 'client'
        ]);

        DB::table('users')->insert([
            'fname' => 'Ruwan',
            'lname' => 'Ganeegama',
            'email' => 'ruwan@gmail.com',
            'password' => bcrypt('password'),
            'company' => 'Zeus',
            'address' => 'No.14, Califonia',
            'telephone' => '0778965214',
            'role' => 'user'
        ]);

        DB::table('products')->insert([
            'model' => 'PO123456',
            'pname' => 'Power EN-Dell'
        ]);

        DB::table('product_inventories')->insert([
            'model' => 'PO123456',
            'units' => 0
        ]);
    }
    

}
