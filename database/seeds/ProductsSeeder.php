<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$products = [];

    	for ($i = 1; $i < 5; $i++) {
    		$products[] = [
				'name' => "Product" . microtime(), 'quantity' => rand(1, 10), 'price' => rand(1, 10),
			];
		}

		DB::table('product')->insert($products);

    }
}
