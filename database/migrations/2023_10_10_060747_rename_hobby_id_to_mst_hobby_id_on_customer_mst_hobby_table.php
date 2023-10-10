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
        Schema::table('customer_mst_hobby', function (Blueprint $table) {
            $table->renameColumn('hobby_id', 'mst_hobby_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_mst_hobby', function (Blueprint $table) {
            $table->renameColumn('mst_hobby_id', 'hobby_id');
        });
    }
};
