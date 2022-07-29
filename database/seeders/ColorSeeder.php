<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            [
                'name' => 'rojo'
            ],
            [
                'name' => 'verde'
            ],
            [
                'name' => 'azul'
            ],
        ];

        foreach ($colors as $color) {
            Color::create($color);
        }
    }
}
