<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$this->call(CountriesTableSeeder::class);
		$this->call(StatesTableSeeder::class);
		$this->call(CitiesTableChunkOneSeeder::class);
		$this->call(CitiesTableChunkTwoSeeder::class);
		$this->call(CitiesTableChunkThreeSeeder::class);
		$this->call(CitiesTableChunkFourSeeder::class);
		$this->call(CitiesTableChunkFiveSeeder::class);	
    }
}
