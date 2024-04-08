<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('123')
        ]);

        // $userData = [
        //     [
        //         'name' => 'Mas Operator',
        //         'email' => 'operator@gmail.com',
        //         'password' =>  bcrypt('123456')
        //     ],

        //     [
        //         'name' => 'Mas Keuangan',
        //         'email' => 'keuangan@gmail.com',
        //         'password' =>  bcrypt('123456')
        //     ],

        //     [
        //         'name' => 'Mas Marketing',
        //         'email' => 'matketing@gmail.com',
        //         'password' =>  bcrypt('123456')
        //     ],
        // ];

        // foreach ($userData as $key => $val){
        //     User::create($val);
        // }
    }
}
