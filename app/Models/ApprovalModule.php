<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApprovalModule extends Model
{
    protected $fillable = [
        'name',
    ];

    public function types()
    {
        return $this->hasMany(ApprovalType::class);
    }
}
