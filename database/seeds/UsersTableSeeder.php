<?php

use Carbon\Carbon;
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
            'name' => 'owner',
            'username' => 'owner',
            'email' => 'owner@site.com',
            'password' => Hash::make('123456789'),
            'group_id' => 1,
            "created_at" =>  Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
    }
}
