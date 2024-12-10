<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    // إضافة الحقول التي يمكن تعيينها بشكل جماعي
    protected $fillable = [
        'name',
        'location',
        'court_number',
        'lawsuit_status',
        'base_number',
        'decision_number'
    ];

    public function lawsuits()
    {
        return $this->hasMany(Lawsuit::class);
    }
}
