<?php

use App\Models\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    protected array $products = ["jeans","drap", "shoes", "shockets", "shirt", "trouer", "bombels", "pullover", "tshirt", "blanket", "short", "underware" ];
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->timestamps();


        });

        foreach ($this->products as $key => $value) {
            Product::create(["name" => $value]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
