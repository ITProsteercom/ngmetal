<?php

use Illuminate\Database\Seeder;

class ReasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reasons')->insert([
            ['name' => 'Damaged packaging'],
            ['name' => 'Damaged content']
        ]);
    }
}
