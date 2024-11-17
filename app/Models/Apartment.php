<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lawsuit;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_number',
        'real_estate_area',
        'share_quota',
        'area',
        'direction',
        'address',
        'financial',
        'previous_signs',
        'notes',
        'attachments'
    ];
}
