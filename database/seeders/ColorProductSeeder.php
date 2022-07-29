<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Builder;

class ColorProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* whereHas nos permite hacer un filtro a las relaciones */
        $products = Product::whereHas('subcategory',function(Builder $query){
            $query->where('color',true)
                  ->where('size',false);
        })->get();

        foreach ($products as $product ) {
            $product->colors()->attach([
                1 => ['quantity' => 5],
                2 => ['quantity' => 10],
                3 => ['quantity' => 15]
            ]);
        }
    }
}
