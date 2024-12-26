<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Translation extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'translation', 'language_id', 'group'];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
