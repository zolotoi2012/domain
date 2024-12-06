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
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger('type_id');
            $table->foreign("type_id")->references("id")->on("types")->onDelete("cascade");
            $table->unsignedBigInteger('category_id');
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade");
            $table->boolean("is_sale");
            $table->boolean("is_active");
            $table->boolean("is_present");
            $table->float("price");
            $table->unsignedBigInteger('brand_id');
            $table->foreign("brand_id")->references("id")->on("brands")->onDelete("cascade");
            $table->unsignedBigInteger('currency_id');
            $table->foreign("currency_id")->references("id")->on("currencies")->onDelete("cascade");
            $table->string("model");
            $table->string("size");
            $table->string("os");
            $table->enum("color", ["red", "green", "blue", "yellow"]);
            $table->string("serial_number");
            $table->integer("discount");
            $table->string("processor");
            $table->string("camera");
            $table->integer("guarantee");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domains');
    }
};
