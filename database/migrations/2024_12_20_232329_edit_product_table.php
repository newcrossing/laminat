<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function ($table) {
            $table->decimal('price_metr', 10, 2)->change();
            $table->decimal('price_metr_sale', 10, 2)->change();
            $table->decimal('price_upak_sale', 10, 2)->change();
            $table->decimal('price_upak', 10, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
