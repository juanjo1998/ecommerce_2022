<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->word(10);
        $subcategory = Subcategory::all()->random();

        /* categoria perteneciente a la subcategoria random*/
        $category = $subcategory->category;
        $brand = $category->brands->random();

        /* condicional quantity */

        if ($subcategory->color) {
            $quantity = null;
        }else{
            $quantity = 15;
        }

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(),
            'excerpt' => $this->faker->text(20),
            'price' => $this->faker->randomElement([5500,45200,3546544]),
            'quantity' => $quantity,
            'status' => Product::PUBLICADO,
            'subcategory_id' => $subcategory->id,
            'brand_id' => $brand->id
        ];
    }
}
