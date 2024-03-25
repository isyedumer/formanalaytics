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
        Schema::create('save_form_records', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->longText('value')->nullable();
            $table->longText('options')->nullable();
            $table->string('type')->nullable();
            $table->string('sessionId')->nullable();
            $table->string('shopName')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('save_form_records');
    }
};
