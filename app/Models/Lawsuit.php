<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Lawsuit extends Model
{
    use HasFactory;
    protected $fillable = ['lawsuit_type', 'lawsuit_subject', 'notes', 'user_id', 'team_id', 'user_case_number'];


    protected $casts = [
        'attachments' => 'array',
    ];


    // علاقة مع الفريق
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    // نطاق الاستعلام لتصفية القضايا حسب المستخدم الحالي
    public function scopeUserLawsuits($query)
    {
        return $query->where('user_id', Auth::id());
    }

    // نطاق الاستعلام لتصفية القضايا حسب الفريق الحالي
    public function scopeTeamLawsuits($query)
    {
        $teamId = Auth::user()->currentTeam->id;
        return $query->where('team_id', $teamId);
    }

    // علاقة مع الشقق
    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }


    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function court()
    {
        return $this->belongsTo(Court::class);
    }
}
