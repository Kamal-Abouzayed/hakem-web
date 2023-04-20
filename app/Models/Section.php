<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['name_ar', 'name_en', 'img'];

    public function getNameAttribute()
    {
        return $this->{'name_' . app()->getLocale()};
    }
}
