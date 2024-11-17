<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['full_name', 'phone', 'address', 'notes', 'user_id', 'team_id', 'user_client_number'];
    public function lawsuits()
    {
        return $this->hasMany(Lawsuit::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
