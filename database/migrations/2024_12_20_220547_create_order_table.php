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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('session')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('tel')->nullable();
            $table->string('email')->nullable();
            $table->string('delivery_type')->nullable()->comment('Способ доставки');
            $table->string('delivery_address')->nullable()->comment('Адрес доставки');
            $table->string('delivery_time')->nullable()->comment('Время доставки');
            $table->string('agent')->nullable()->comment('Физ лицо или юр');
            $table->string('payment')->nullable()->comment('Тип оплаты');
            $table->string('comment')->nullable()->comment('Комментарий к заказу');
            $table->integer('price_delivery')->nullable()->comment('Стоимость доставки');
            $table->decimal('price_total', 10, 2)->nullable()->comment('Сумма заказа без доставки');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('oredr_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('count')->default(1);
            $table->decimal('price', 10, 2)->nullable()->default(null)->comment("стоимость одной единицы");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_product');
    }
};
