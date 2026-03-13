<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wallets')->insert([

            [
                'user_id' => '1',
                'currency_id' => 1,
                'balance' => 1000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => '2',
                'currency_id' => 2,
                'balance' => 500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => '3',
                'currency_id' => 3,
                'balance' => 800,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
