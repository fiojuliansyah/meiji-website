<?php

namespace App\Models;

use App\Models\Traits\TranslatableSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Contracts\HasTranslatableSlug;

class News extends Model
{
    use TranslatableSlug;
    
    protected $fillable = ['news_category_id', 'image', 'slug', 'name', 'content', 'is_published', 'date_published', 'end_date'];

    protected $casts = [
        'slug' => 'array',
        'name' => 'array',
        'content' => 'array',
    ];
    
    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? Storage::url($this->image) : null;
    }

    public function getTranslation($attribute, $locale, $fallback = true)
    {
        $translations = $this->{$attribute};
        
        if (isset($translations[$locale])) {
            return $translations[$locale];
        }
        
        if ($fallback && isset($translations[config('app.fallback_locale')])) {
            return $translations[config('app.fallback_locale')];
        }
        
        return null;
    }

    public function setTranslation($attribute, $locale, $value)
    {
        $translations = $this->{$attribute} ?? [];
        $translations[$locale] = $value;
        $this->{$attribute} = $translations;
        
        return $this;
    }

    public function hasTranslation($attribute, $locale)
    {
        return isset($this->{$attribute}[$locale]);
    }

    public function getTranslations($attribute)
    {
        return $this->{$attribute} ?? [];
    }

    public function approvals()
    {
        return $this->morphMany(Approval::class, 'approvable');
    }

    public function requiredApprovals()
    {
        return $this->morphMany(ContentApprovalRequirement::class, 'approvable');
    }

    public function isFullyApproved(): bool
    {
        $requiredTypes = $this->requiredApprovals()->pluck('approval_type_id');
        $approvedTypes = $this->approvals()->pluck('approval_type_id');

        return $requiredTypes->diff($approvedTypes)->isEmpty();
    }

    protected function casts(): array
    {
        return [
            'date_published' => 'date',
        ];
    }
}