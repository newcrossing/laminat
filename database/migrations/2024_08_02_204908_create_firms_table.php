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
        Schema::create('firms', function (Blueprint $table) {
            $table->id();
            $table->integer('country_id')->unsigned()->nullable()->default(null);
            $table->string('name')->nullable();
            $table->text('text')->nullable();
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->boolean('public')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->integer('firm_id')->unsigned()->comment('ид фирмы производителя');
            $table->string('name')->nullable();
            $table->text('text')->nullable();
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->boolean('public')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('text')->nullable();
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->boolean('public')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::table('products', function (Blueprint $table) {
            $table->integer('collection_id')->unsigned()->nullable()->after('id')->comment('ид коллекции');
            $table->integer('type_id')->unsigned()->nullable()->after('id')->comment('ид тип');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('firms');
        Schema::dropIfExists('collections');
        Schema::dropIfExists('types');
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['collection_id', 'type_id']);
        });
    }
};
