<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['question_ar', 'question_en', 'answer_ar', 'answer_en'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'question_en'
            ]
        ];
    }

    public function getQuestionAttribute()
    {
        return $this->{'question_' . app()->getLocale()};
    }

    public function getAnswerAttribute()
    {
        return $this->{'answer_' . app()->getLocale()};
    }
}
