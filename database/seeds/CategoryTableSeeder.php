<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $category = new Category([
        	'category' => 'teknologi'
        ]);

        $category->save();

        $category = new Category([
        	'category' => 'pengetahuan sosial'
        ]);

        $category->save();

        $category = new Category([
        	'category' => 'pemrograman'
        ]);

        $category->save();

        $category = new Category([
        	'category' => 'komputer'
        ]);

        $category->save();
    }
}
