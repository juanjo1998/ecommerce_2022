<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = [
            [
                'name' => 'sin color ni talla',
                'slug' => Str::slug('sin color ni talla'),
                'icon' => '<i class="fa-solid fa-code-simple"></i>',
            ],

            [
                'name' => 'celulares',
                'slug' => Str::slug('celulares'),
                'icon' => '<i class="fa-solid fa-mobile-screen"></i>',
            ],

            [
                'name' => 'computadores',
                'slug' => Str::slug('computadores'),
                'icon' => '<i class="fa-solid fa-laptop"></i>',
            ],

            [
                'name' => 'consolas',
                'slug' => Str::slug('consolas'),
                'icon' => '<i class="fa-solid fa-gamepad"></i>',
            ],

            [
                'name' => 'audio',
                'slug' => Str::slug('audio'),
                'icon' => '<i class="fa-solid fa-speaker"></i>',
            ],

            [
                'name' => 'moda',
                'slug' => Str::slug('moda'),
                'icon' => '<i class="fa-solid fa-clothes-hanger"></i>',
            ],
        ];   

        foreach ($categories as $category) {
            $category = Category::factory(1)->create($category)->first();

            $brands = Brand::factory(4)->create();

            foreach ($brands as $brand) {
                $brand->categories()->attach($category->id);
            }          
        }
    }
}
