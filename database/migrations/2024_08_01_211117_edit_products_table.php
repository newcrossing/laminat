<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('have_sklad')->default(false)->after('square')->comment('Наличие');
            $table->boolean('have_room')->default(false)->after('square')->comment('Наличие в руме');
            $table->integer('price_upak')->nullable()->default('0')->after('square')->comment('Цена');
            $table->text('description')->nullable()->after('square');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['have_sklad', 'have_room', 'price_upak', 'description']);
        });
    }
};
