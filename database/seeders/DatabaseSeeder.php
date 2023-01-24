<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CurrencyType;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(1)->create();

         $currencies = [
           ['name'=>'BDT'],
           ['name'=>'USD'],
           ['name'=>'EURO']
         ];
         foreach ($currencies as $currency){
             CurrencyType::factory()->create($currency);
         }
    }
}
