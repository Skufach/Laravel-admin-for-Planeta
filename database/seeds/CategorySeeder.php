<?php

use Illuminate\Database\Seeder;
use App\Models\Category as Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            [
                'category_name' => 'Зимние каникулы',
            ],
            [
                'category_name' => 'Горнолыжный отдых',
            ],
            [
                'category_name' => 'Отдых в Европе',
            ],
            [
                'category_name' => 'Отдых в России',
            ]
        ]);
    }
}
