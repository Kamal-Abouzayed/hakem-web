<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCheckup extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'checkup_id'
    ];
}
