<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign('order_items_product_id_foreign');

            // Ajouter une nouvelle contrainte avec ON DELETE CASCADE
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('order_items', function (Blueprint $table) {
            // Supprimer la contrainte de clé étrangère avec ON DELETE CASCADE
            $table->dropForeign('order_items_product_id_foreign');

            // Ajouter une nouvelle contrainte sans ON DELETE CASCADE (ou remettre la contrainte précédente)
            $table->foreign('product_id')->references('id')->on('products');
        });
    }
};
