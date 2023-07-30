<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Category Factory
        for ($i=0; $i <10 ; $i++) {
            $faker = Factory::create();
            Category::create([
                'title' => $faker->word . $i,
                'image' => 'style_files/frontend/img/default_filet.png',
            ]);
        }

           // Blog Factory
        for ($i=0; $i <30 ; $i++) {

            $faker = Factory::create();
            Blog::create([
                'user_id'=>rand(1,2),
                'category_id'=>rand(1,10),
                'title' => $faker->word,
                'description'=> $faker->sentence(45),
                'image' => 'style_files/frontend/img/default_filet.png',
                'status'=>rand(1,2),
            ]);
        }


    }
}
