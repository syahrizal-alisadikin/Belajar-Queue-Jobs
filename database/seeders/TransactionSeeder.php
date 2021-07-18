<?php

namespace Database\Seeders;

use App\Models\Kota;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $kota = Kota::all();
        foreach ($kota as $ko){
            Transaction::create([
                'kota_id' => $ko->id,
                'name' => $faker->name
            ]);
        }
    }
}
