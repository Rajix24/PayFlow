<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('currencies')->insert([
            ['currency' => 'USD', 'created_at' => now(), 'updated_at' => now()],
            ['currency' => 'EUR', 'created_at' => now(), 'updated_at' => now()],
            ['currency' => 'MAD', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
