<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lawsuit extends Model
{
    use HasFactory;

    protected $fillable = [
        'lawsuit_type',
        'lawsuit_subject',
        'court',
        'court_number',
        'plaintiff_name',
        'defendant_name',
        'lawsuit_status',
        'attachments',
        'agreed_amount',
        'remaining_amount',
        'paid_amount',
        'notes',
        'base_number',
        'decision_number',

    ];

    protected $casts = [
        'attachments' => 'array',
    ];


    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function plaintiff()
    {
        return $this->belongsTo(Client::class, 'plaintiff_name');
    }

    public function defendant()
    {
        return $this->belongsTo(Client::class, 'defendant_name');
    }
}
