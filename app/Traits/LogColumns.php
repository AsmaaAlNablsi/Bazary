<?php

namespace App\Traits;

use Illuminate\Database\Schema\Blueprint;

trait LogColumns
{
    public function LogColumns(Blueprint $table, bool $nullable = false)
    {
        $table->timestamp('created_at')->useCurrent();
        if ($nullable)
            $table->foreignId('created_by')->nullable()->default(NULL)->references('id')->on('users')->after('created_at');
        else
            $table->foreignId('created_by')->references('id')->on('users')->after('created_at');

        $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        $table->timestamp('deleted_at')->nullable()->default(NULL);
        $table->foreignId('deleted_by')->nullable()->default(NULL)->references('id')->on('users')->after('deleted_at');
        $table->foreignId('updated_by')->nullable()->default(NULL)->references('id')->on('users')->after('updated_at');
    }

}
