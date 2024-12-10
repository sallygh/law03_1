<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    protected $fillable = [
        'lawsuit_id',
        'agreed_amount',
        'paid_amount',
        'remaining_amount'
    ];

    public function lawsuit()
    {
        return $this->belongsTo(Lawsuit::class);
    }
}
