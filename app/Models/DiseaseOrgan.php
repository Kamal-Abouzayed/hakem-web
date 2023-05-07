<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiseaseOrgan extends Model
{
    use HasFactory;

    protected $fillable = [
        'disease_id',
        'organ_id',
    ];
}
