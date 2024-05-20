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
            $table->timestamps();
            $table->string('name');
            $table->text('description');
            $table->string('image');
            $table->decimal('price', 8, 2);
            $table->integer('stock');
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->onDelete('no action');
            $table->decimal('total', 8, 2);
            $table->string('status');
            $table->string('address');
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('order_id')->constrained()->onDelete('no action');
            $table->foreignId('product_id')->constrained()->onDelete('no action');
            $table->integer('quantity');
            $table->decimal('price', 8, 2);
        });

        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('code');
            $table->decimal('value', 8, 2);
            $table->dateTime('expires_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('discounts');
    }
};
