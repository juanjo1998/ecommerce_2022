<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [

            /* subcategoria sin color ni talla */
            [
                'name' => 'subcategoria sin color ni talla',
                'slug' => Str::slug('subcategoria sin color ni talla'),             
                'category_id' => 1
            ],

            /* celulares */
            [
                'name' => 'gama baja',
                'slug' => Str::slug('gama baja'),
                'color' => true,
                'category_id' => 2
            ],

            [
                'name' => 'gama media',
                'slug' => Str::slug('gama media'),
                'color' => true,
                'category_id' => 2
            ],

            [
                'name' => 'gama alta',
                'slug' => Str::slug('gama alta'),
                'color' => true,
                'category_id' => 2
            ],

            /* portatiles */
            [
                'name' => 'computadores portatiles',
                'slug' => Str::slug('computadores portatiles'),  
                'color' => true,
                'category_id' => 3
            ],

            [
                'name' => 'computadores de escritorio',
                'slug' => Str::slug('computadores de escritorio'),  
                'color' => true,
                'category_id' => 3
            ],         

            /* consolas */

            [
                'name' => 'consolas hogar',
                'slug' => Str::slug('consolas hogar'),
                'color' => true,
                'category_id' => 4
            ],

            [
                'name' => 'consolas portatiles',
                'slug' => Str::slug('consolas portatiles'),
                'color' => true,
                'category_id' => 4
            ],

            [
                'name' => 'consolas retro',
                'slug' => Str::slug('consolas retro'),
                'color' => true,
                'category_id' => 4
            ],

            /* audio */

            [
                'name' => 'sonido para el hogar',
                'slug' => Str::slug('sonido para el hogar'),
                'color' => true,
                'category_id' => 5
            ],

            [
                'name' => 'parlantes para equipos',
                'slug' => Str::slug('parlantes para equipos'),
                'color' => true,
                'category_id' => 5
            ],

            /* moda */

            [
                'name' => 'ropa para mujer',
                'slug' => Str::slug('ropa para mujer'),
                'color' => true,
                'size' => true,
                'category_id' => 6
            ],

            [
                'name' => 'ropa para hombre',
                'slug' => Str::slug('ropa para hombre'),
                'color' => true,
                'size' => true,
                'category_id' => 6
            ],
        ];

        foreach ($subcategories as $subcategory) {
            Subcategory::factory(1)->create($subcategory);
        }
    }
}
