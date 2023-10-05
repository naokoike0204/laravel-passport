<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstHobbySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $params = [
            ['id' => 1, 'name' => '映画鑑賞'],
            ['id' => 2, 'name' => '読書'],
            ['id' => 3, 'name' => '買い物'],
        ];
        DB::table('mst_hobbies')->insert($params);
    }
}
