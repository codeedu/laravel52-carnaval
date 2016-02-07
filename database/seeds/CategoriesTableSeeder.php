<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\CodePub\Models\Category::class)->create([
           'name'=>'Art'
        ]);

        factory(\CodePub\Models\Category::class)->create([
            'name'=>'Tech'
        ]);

        factory(\CodePub\Models\Category::class)->create([
            'name'=>'Business'
        ]);
    }
}
