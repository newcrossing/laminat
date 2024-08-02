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
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('have_sklad')->default(false)->after('square')->comment('Наличие');
            $table->boolean('have_room')->default(false)->after('square')->comment('Наличие в руме');
            $table->integer('price_upak')->nullable()->after('square')->comment('Цена');
            $table->text('description')->after('square');
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
