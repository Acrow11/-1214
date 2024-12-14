<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder; 
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => '商品名',
            'price' => 1000,
            'image_path' => '画像パス',
        ]);
    }
}
