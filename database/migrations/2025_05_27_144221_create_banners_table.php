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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('Название');
            $table->boolean('public')->nullable()->comment('Публикация');
            $table->string('block')->nullable()->comment('Местоположение банера');
            $table->string('target_url')->nullable()->comment('Опционально по какой URL показывается. * при всех');
            $table->boolean('target_url_self')->nullable()->comment('Показывать только по этому URL или же и при вложенных');
            $table->text('url')->nullable()->comment('Ссылка с банера');
            $table->bigInteger('order')->default('0')->nullable()->comment('Сортировка');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
