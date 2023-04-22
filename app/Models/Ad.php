<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = ['desc_ar', 'desc_en', 'btn_text_ar', 'btn_text_en', 'link', 'img'];

    public function getBtnTextAttribute()
    {
        return $this->{'btn_text_' . app()->getLocale()};
    }

    public function getDescAttribute()
    {
        return $this->{'desc_' . app()->getLocale()};
    }
}
