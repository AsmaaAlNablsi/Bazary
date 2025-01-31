<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use \App\Traits\LogColumns;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('specialties', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar', 50)->unique();
            $table->string('name_en', 50)->unique();
            $table->string('code', 50)->unique();
            $table->text('details_ar')->nullable();
            $table->text('details_en')->nullable();
            
            $this->LogColumns($table);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specialties');
    }
};
