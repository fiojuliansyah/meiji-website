<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApprovalType extends Model
{
    protected $fillable = ['name', 'user_id', 'approval_module_id', 'is_edit', 'is_preview'];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function module()
    {
        return $this->belongsTo(ApprovalModule::class, 'approval_module_id');
    }
}
