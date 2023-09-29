<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstGendersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $params = [
            ['id' => 1, 'name' => '男性'],
            ['id' => 2, 'name' => '女性'],
        ];
        DB::table('mst_genders')->insert($params);
    }
}
