<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'name' => 'Site name',
                'code' => 'APP_NAME',
                'value' => 'NG Metal',
                'isEmail' => false
            ], [
                'name' => 'Mail from adress',
                'code' => 'MAIL_FROM_ADDRESS',
                'value' => 'admin@admin.dev',
                'isEmail' => true
            ], [
                'name' => 'Admin email',
                'code' => 'ADMIN_EMAIL',
                'value' => 'admin@admin.dev',
                'isEmail' => true
            ]
        ]);
    }
}
