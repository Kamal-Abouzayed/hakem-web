<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['name_ar', 'name_en', 'img', 'desc_ar', 'desc_en', 'views', 'user_id'];

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

    public function getCreatedAtAttribute($date)
    {

        $dateFromat = Carbon::createFromFormat('Y-m-d H:i:s', $date);

        // Get the current app locale
        $locale = app()->getLocale();

        // Tell Carbon to use the current app locale
        Carbon::setlocale($locale);

        /**
         * Set the date format you'd like to use.
         * Here, I use two different formats depending on current app locale.
         *
         * For Example: `D, M j, Y H:i:s` outputs `mer., oct. 21, 2020 15:11:07`,
         *  and `D, M j, Y g:i A` outputs `mer., oct. 21, 2020 3:26 PM`
         * If you have a look at the below function 👇🏻 in the Carbon source code,
         * you'll see it uses the first format mentioned above.
         *
         * @see \Carbon\Traits\Converter::toDayDateTimeString()
         */
        $format = $locale === 'ar' ? 'M d ,Y' : 'Y, d M';

        // Use `translatedFormat()` to get a translated date string
        return $dateFromat->translatedFormat($format);
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_vaccinations', 'vaccination_id', 'article_id')
            ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
