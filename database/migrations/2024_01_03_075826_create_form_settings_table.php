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
        Schema::create('form_settings', function (Blueprint $table) {
            $table->id();
            $table->text('shop_name')->nullable();

            $table->text('logo_link')->nullable();
            $table->text('logo_alignment')->nullable();

            $table->text('form_title')->nullable();
            $table->text('title_text_size')->nullable();
            $table->text('title_text_alignment')->nullable();
            $table->text('title_text_color')->nullable();

            $table->text('form_desc')->nullable();
            $table->text('desc_text_size')->nullable();
            $table->text('desc_text_alignment')->nullable();
            $table->text('desc_text_color')->nullable();


            $table->text('body_background_color')->nullable();
            $table->text('body_background_opacity')->nullable();

            $table->text('form_background_type')->nullable();
            $table->text('form_background_color')->nullable();
            $table->text('form_background_image_link')->nullable();
            $table->text('form_background_opacity')->nullable();
            $table->text('form_fields_title_text_color')->nullable();
            $table->text('form_fields_border_color')->nullable();
            
            
            $table->text('btn_background_color')->nullable();
            $table->text('btn_text')->nullable();
            $table->text('btn_text_color')->nullable();
            $table->text('btn_alignment')->nullable();

            $table->text('input_1')->nullable();
            $table->text('input_2')->nullable();
            $table->text('input_3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_settings');
    }
};
