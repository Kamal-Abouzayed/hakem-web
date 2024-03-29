<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['name_ar', 'name_en', 'img', 'desc_ar', 'desc_en', 'section_id', 'category_id', 'views', 'user_id'];

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

    public function section()
    {
        return $this->belongsTo(Section::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function diseases()
    {
        return $this->belongsToMany(Article::class, 'disease_medicines', 'medicine_id', 'disease_id')->where('section_id', 4)
            ->withTimestamps();
    }

    public function medicines()
    {
        return $this->belongsToMany(Article::class, 'disease_medicines', 'disease_id', 'medicine_id')->where('section_id', 5)
            ->withTimestamps();
    }

    public function organs()
    {
        return $this->belongsToMany(Organ::class, 'disease_organs', 'disease_id', 'organ_id')
            ->withTimestamps();
    }

    public function checkups()
    {
        return $this->belongsToMany(Checkup::class, 'article_checkups', 'article_id', 'checkup_id')
            ->withTimestamps();
    }

    public function vaccinations()
    {
        return $this->belongsToMany(Vaccination::class, 'article_vaccinations', 'article_id', 'vaccination_id')
            ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
