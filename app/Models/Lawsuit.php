<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Lawsuit extends Model
{
    use HasFactory;

    protected $fillable = ['lawsuit_type', 'lawsuit_subject', 'court', 'court_number', 'plaintiff_name', 'defendant_name', 'lawsuit_status', 'attachments', 'agreed_amount', 'remaining_amount', 'paid_amount', 'notes', 'base_number', 'decision_number', 'user_id', 'team_id', 'user_case_number'];

    protected $casts = [
        'attachments' => 'array',
    ];

    // العلاقات مع النماذج الأخرى
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
}
