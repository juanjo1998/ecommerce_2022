<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);

        /* CategorySeeder */
        Storage::deleteDirectory('categories');
        Storage::makeDirectory('categories');
        $this->call(CategorySeeder::class);

        /* SubcategorySeeder */
        Storage::deleteDirectory('subcategories');
        Storage::makeDirectory('subcategories');
        $this->call(SubcategorySeeder::class);

        /* ProductSeeder */
        Storage::deleteDirectory('products');
        Storage::makeDirectory('products');
        $this->call(ProductSeeder::class);

        /* ColorSeeder */
        $this->call(ColorSeeder::class);

        /* ColorProductSeeder */
        $this->call(ColorProductSeeder::class);

        /* SizeSeeder */
        $this->call(SizeSeeder::class);        
    }
}
