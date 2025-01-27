<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentApprovalRequirement extends Model
{
    protected $fillable = ['approvable_type', 'approvable_id', 'approval_type_id'];

    public function approvable()
    {
        return $this->morphTo();
    }

    public function approvalType()
    {
        return $this->belongsTo(ApprovalType::class, 'approval_type_id');
    }
}