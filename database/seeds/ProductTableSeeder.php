<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = new Product([
            'category_id'  =>  1,
        	'imagePath' => 'http://www.magazinefuse.com/wp-content/uploads/2015/09/5-Mastering-Laravel.jpg',
        	'title' => 'Laravel Book',
        	'description' => 'Buku ini sangat menarik dan bermanfaat sekali bagi programmer pemula',
        	'price' => 20
        ]);

        $products->save();

        $products = new Product([
            'category_id'  =>  2,
        	'imagePath' => 'http://www.magazinefuse.com/wp-content/uploads/2015/09/5-Mastering-Laravel.jpg',
        	'title' => 'Laravel Book',
        	'description' => 'Buku ini sangat menarik dan bermanfaat sekali bagi programmer pemula',
        	'price' => 20
        ]);

        $products->save();

        $products = new Product([
            'category_id'  =>  3,
        	'imagePath' => 'http://www.magazinefuse.com/wp-content/uploads/2015/09/5-Mastering-Laravel.jpg',
        	'title' => 'Laravel Book',
        	'description' => 'Buku ini sangat menarik dan bermanfaat sekali bagi programmer pemula',
        	'price' => 20
        ]);

        $products->save();

        $products = new Product([
            'category_id'  =>  4,
        	'imagePath' => 'http://www.magazinefuse.com/wp-content/uploads/2015/09/5-Mastering-Laravel.jpg',
        	'title' => 'Laravel Book',
        	'description' => 'Buku ini sangat menarik dan bermanfaat sekali bagi programmer pemula',
        	'price' => 20
        ]);

        $products->save();

        $products = new Product([
            'category_id'  =>  1,
        	'imagePath' => 'http://www.magazinefuse.com/wp-content/uploads/2015/09/5-Mastering-Laravel.jpg',
        	'title' => 'Laravel Book',
        	'description' => 'Buku ini sangat menarik dan bermanfaat sekali bagi programmer pemula',
        	'price' => 20
        ]);

        $products->save();

        $products = new Product([
            'category_id'  =>  2,
        	'imagePath' => 'http://www.magazinefuse.com/wp-content/uploads/2015/09/5-Mastering-Laravel.jpg',
        	'title' => 'Laravel Book',
        	'description' => 'Buku ini sangat menarik dan bermanfaat sekali bagi programmer pemula',
        	'price' => 20
        ]);

        $products->save();
    }
}
