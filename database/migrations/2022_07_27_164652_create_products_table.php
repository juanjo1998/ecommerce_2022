<?php

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subcategory_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('name');
            $table->string('slug');
            $table->mediumText('excerpt');
            $table->text('description');
            $table->float('price',8,0);
            $table->integer('quantity')->nullable();
            $table->enum('status',[Product::BORRADOR,Product::PUBLICADO])->default(Product::BORRADOR);
            $table->timestamps();

            // ! foreign key

            $table->foreign('subcategory_id')
            ->references('id')
            ->on('subcategories')
            ->onDelete('cascade');

            $table->foreign('brand_id')
            ->references('id')
            ->on('brands')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
