<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Traits;
return new class extends Migration
{
    use Traits\LogColumns;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('general_codes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->tinyInteger('level');
            $table->string('code', 50)->unique()->nullable();
            $table->string('description_ar', 100);
            $table->string('description_en', 100);
            $table->boolean('is_active');
            $table->foreign('parent_id')->references('id')->on('general_codes');
            $this->LogColumns($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_codes');
    }
};
