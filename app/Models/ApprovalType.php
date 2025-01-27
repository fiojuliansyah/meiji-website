<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApprovalType extends Model
{
    protected $fillable = ['name', 'user_id'];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
