<?php
namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
   
    
     
    protected $model = Product::class;

   

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'price' => $this->faker->numberBetween(100, 10000),
            'season' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'image' => $this->faker->imageUrl(640, 480, 'product', true),
        ];
    }
}
