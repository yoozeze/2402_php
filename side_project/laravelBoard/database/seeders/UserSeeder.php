<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(20)->create();
        // $arr = [
        //     'name' => '관리자'
        //     ,'email' => 'qwe@qwe.com'
        //     ,'password' => Hash::make('qwe123')
        // ];
        // User::create($arr);
    }
}
