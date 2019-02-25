<?php

use Illuminate\Database\Seeder;
use App\Models\Country as Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::insert([
            [
                'country_name' => 'Россия',
            ],
            [
                'country_name' => 'Польша',
            ],
            [
                'country_name' => 'Германия',
            ],
            [
                'country_name' => 'Австрия',
            ]
        ]);
    }
}
