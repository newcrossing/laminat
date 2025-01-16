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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('status')->after('user_id')->nullable()->default(null)->comment('Статус заказа');
            $table->string('order_number')->after('user_id')->nullable()->default(null)->comment('Номер заказа');
            $table->longText('order_comment')->after('user_id')->nullable()->default(null)->comment('Комментарий к заказу от менеджера');
        });

        Schema::table('orders', function ($table) {
            $table->string('price_delivery')->nullable()->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['status', 'order_number','order_comment']);
        });
    }
};
