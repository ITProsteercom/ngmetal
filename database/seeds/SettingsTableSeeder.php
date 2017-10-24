<?php

use App\Setting;
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
        Setting::create([
                'name' => 'Site name',
                'code' => 'APP_NAME',
                'value' => ['NG Metal'],
                'isEmail' => false,
                'isMultiple' => false
            ]);
        Setting::create([
                'name' => 'Mail from adress',
                'code' => 'MAIL_FROM_ADDRESS',
                'value' => ['admin@admin.dev'],
                'isEmail' => true,
                'isMultiple' => false
            ]);
        Setting::create([
                'name' => 'Admin email',
                'code' => 'ADMIN_EMAIL',
                'value' => ['admin@admin.dev' , 'yura.kalishchuk@gmail.com'],
                'isEmail' => true,
                'isMultiple' => true
            ]);
    }
}
