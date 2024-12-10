<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'lawsuit_id',
        'title',
        'description',
        'file_path',
        'thumbnail'
    ];

    public function lawsuit()
    {
        return $this->belongsTo(Lawsuit::class);
    }
}
