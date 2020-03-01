<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'id' => 1,
                'name' => 'add_user',
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'edit_user',
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => 'remove_user',
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                'id' => 4,
                'name' => 'add_group',
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                'id' => 5,
                'name' => 'edit_group',
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                'id' => 6,
                'name' => 'remove_group',
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                'id' => 7,
                'name' => 'list_group',
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ]
        ]);
    }
}
