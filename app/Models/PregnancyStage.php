<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class PregnancyStage extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['name_ar', 'name_en', 'img', 'desc_ar', 'desc_en', 'parent_id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name_en'
            ]
        ];
    }

    public function getNameAttribute()
    {
        return $this->{'name_' . app()->getLocale()};
    }

    public function getDescAttribute()
    {
        return $this->{'desc_' . app()->getLocale()};
    }

    public function parent()
    {
        return $this->belongsTo(PregnancyStage::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(PregnancyStage::class, 'parent_id');
    }
}
