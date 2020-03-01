<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            [
                'id' => 1,
                'name' => 'superadmin',
                'is_core' => 1,
                'is_default' => 0,
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'admin',
                'is_core' => 1,
                'is_default' => 0,
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => 'user',
                'is_core' => 1,
                'is_default' => 1,
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ]
        ]);
    }
}
