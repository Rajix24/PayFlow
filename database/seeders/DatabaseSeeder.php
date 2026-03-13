<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('users')->insert([
            [
                'name' => 'User One',
                'email' => 'user1@gmail.com',
                'password' => 'user1@gmail.com',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'User Two',
                'email' => 'user2@gmail.com',
                'password' => 'user2@gmail.com',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'User Three',
                'email' => 'user3@gmail.com',
                'password' => 'user3@gmail.com',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
        $this->call([
            CurrencySeeder::class,
        ]);

        $this->call([
            WalletSeeder::class,
        ]);
    }
}
