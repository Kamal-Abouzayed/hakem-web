<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['name_ar', 'name_en', 'desc_ar', 'desc_en', 'img', 'section_id'];

    // protected $sluggable = 'name_en';

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

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    // public function parent()
    // {
    //     return $this->belongsTo(Category::class, 'parent_id');
    // }

    // public function children()
    // {
    //     return $this->hasMany(Category::class, 'parent_id');
    // }
}
