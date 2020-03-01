<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('group_permission')->insert([
            [
                'group_id' => 1,
                'permission_id' => 1,
                'value' => 1,
                'read_only' => 1,
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                'group_id' => 1,
                'permission_id' => 2,
                'value' => 1,
                'read_only' => 1,
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                'group_id' => 1,
                'permission_id' => 3,
                'value' => 1,
                'read_only' => 1,
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                'group_id' => 1,
                'permission_id' => 4,
                'value' => 1,
                'read_only' => 1,
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                'group_id' => 1,
                'permission_id' => 5,
                'value' => 1,
                'read_only' => 1,
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                'group_id' => 1,
                'permission_id' => 6,
                'value' => 1,
                'read_only' => 1,
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                'group_id' => 1,
                'permission_id' => 7,
                'value' => 1,
                'read_only' => 1,
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                'group_id' => 2,
                'permission_id' => 1,
                'value' => 1,
                'read_only' => 0,
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                'group_id' => 2,
                'permission_id' => 2,
                'value' => 1,
                'read_only' => 0,
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                'group_id' => 2,
                'permission_id' => 3,
                'value' => 1,
                'read_only' => 0,
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                'group_id' => 2,
                'permission_id' => 7,
                'value' => 1,
                'read_only' => 0,
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ]
        ]);
    }
}
