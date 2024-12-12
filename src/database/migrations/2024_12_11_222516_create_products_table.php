<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand');
            $table->string('ean');
            $table->decimal('price', 16, 8);
            $table->string('image');
            $table->text('description');
            $table->boolean('is_sale');
            $table->string('color');
            $table->string('size');
            $table->boolean('is_active');
            $table->string('discount');
            $table->string('model');
            $table->string('weight');
            $table->string('currency');
            $table->string('amount_per_package');
            $table->string('short_description');
            $table->string('country_of_origin');
            $table->string('expiration_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
