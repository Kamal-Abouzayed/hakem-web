<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    use HasFactory;

    protected $fillable = ['desc_ar', 'desc_en', 'section_id'];

    public function getDescAttribute()
    {
        return $this->{'desc_' . app()->getLocale()};
    }
}
