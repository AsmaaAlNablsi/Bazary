<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Traits\LogColumns;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->tinyInteger('level');
            $table->string('name_ar', 50);
            $table->string('name_en', 50);
            $table->string('code', 50)->unique()->nullable();
            $table->boolean('is_active');
            $table->foreign('parent_id')->references('id')->on('addresses');
            $this->LogColumns($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
