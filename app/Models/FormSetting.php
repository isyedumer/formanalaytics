<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'shop_name','logo_link','logo_alignment','form_title','title_text_size','title_text_alignment','title_text_color','form_desc','desc_text_size','desc_text_alignment','desc_text_color','body_background_color','body_background_opacity','form_background_type','form_background_color','form_background_opacity','form_background_image_link','form_fields_title_text_color','form_fields_border_color','btn_background_color','btn_text','btn_text_color','btn_alignment'
    ];
}
