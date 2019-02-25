<?php

use Illuminate\Database\Seeder;
use App\Models\Post as Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::insert([
            [
                'title' => 'Россия',
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
