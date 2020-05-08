<?php

use Illuminate\Database\Seeder;
use App\Setting;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'site_name'=>'Omar Al-muhtaseb',
            'email'=>'omar@laravel.com',
            'phone'=>'01234',
            'address'=>'Amman'
        ]);
    }
}
