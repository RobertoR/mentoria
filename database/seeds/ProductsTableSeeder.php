<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\ProductType;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductType::create([
            'name' => 'Discos duros'
        ]);
        ProductType::create([
            'name' => 'Monitores'
        ]);
        Product::create([
            'product_type_id' => 1,
            'titulo' => 'SSD ADATA 250GB',
            'price' => 230.00
        ]);
        Product::create([
            'product_type_id' => 2,
            'titulo' => 'HP 27"',
            'price' => 250.00
        ]);
    }
}
