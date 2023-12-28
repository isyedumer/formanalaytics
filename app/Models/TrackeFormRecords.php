<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackeFormRecords extends Model
{
    use HasFactory;
    protected $table = 'tracke_form_records';
    protected $fillable = [
        'form_name',
        'session_id',
        'customer_id',
        'form_type',
        'form_fields',
        'number_of_total_fields',
        'form_content',
        'number_of_filled_fields',
        'fields_value',
        'shopName',
    ];
}
