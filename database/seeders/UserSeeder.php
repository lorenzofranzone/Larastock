<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
Use DB;
Use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name'=>'Lorenzo',
            'email'=>'lorenzo.franzone@gmail.com',
            'password'=>Hash::make('password'),
            'created_at'=>\Carbon\Carbon::now(),
            'email_verified_at'=>\Carbon\Carbon::now()
        ]);
        User::factory(10)->create();

    }
}
