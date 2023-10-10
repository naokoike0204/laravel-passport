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
        Schema::rename('customers_hobbies','customer_mst_hobby');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('customer_mst_hobby','customers_hobbies');
    }
};
