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
            $table->decimal('packing_volume',8,4)->after('square')->nullable()->default(null)->comment('объем упаковки');
            $table->decimal('packing_weight')->after('square')->nullable()->default(null)->comment('вес упаковки');
            $table->integer('number_of_boards')->after('square')->nullable()->default(null)->comment('досок в упаковке');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['packing_volume','packing_weight','number_of_boards']);
        });
    }
};
