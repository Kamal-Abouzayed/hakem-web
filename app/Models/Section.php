<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Section extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['name_ar', 'name_en', 'img'];

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

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
