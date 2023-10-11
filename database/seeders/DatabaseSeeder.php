<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;
use Database\Seeders\MstPrefectureSeeder;
use Database\Seeders\MstHobbySeeder;
use Database\Seeders\MstGendersSeeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    private const SEEDERS = [
        MstPrefectureSeeder::class,
        MstHobbySeeder::class,
        MstGendersSeeder::class,
    ];
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        foreach(self::SEEDERS as $seeder) {
            $this->call($seeder);
        }
    }
}
