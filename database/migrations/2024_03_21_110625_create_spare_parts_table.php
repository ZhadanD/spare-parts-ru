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
        Schema::create('spare_parts', function (Blueprint $table) {
            $table->id();

            $table->string('img');
            $table->string('name');
            $table->string('short_desc');
            $table->string('desc');
            $table->string('status');

            $table->unsignedBigInteger('category_id')->nullable();
            $table->index('category_id', 'spare_parts_category_idx');
            $table->foreign('category_id', 'spare_parts_category_fk')->on('categories')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spare_parts');
    }
};
