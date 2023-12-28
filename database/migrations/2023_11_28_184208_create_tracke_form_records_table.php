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
        Schema::create('tracke_form_records', function (Blueprint $table) {
            $table->id();

            $table->longText('form_name')->nullable();
            $table->longText('session_id')->nullable();
            $table->longText('customer_id')->nullable();
            $table->longText('form_type')->nullable();
            $table->longText('form_fields')->nullable();
            $table->longText('number_of_total_fields')->nullable();
            $table->boolean('form_content')->nullable();
            $table->longText('number_of_filled_fields')->nullable();
            $table->longText('fields_value')->nullable();
            $table->longText('shopName')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracke_form_records');
    }
};
