<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    // علاقة مع القضايا
    public function lawsuits()
    {
        return $this->hasMany(Lawsuit::class);
    }
}
