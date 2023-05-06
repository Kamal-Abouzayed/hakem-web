<?php

namespace App\Models;

use App\Mail\VerificationMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'phone',
        'country_id',
        'password',
        'gender',
        'birthday',
        'image',
        'code',
        'isActive',
        'uid',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthday'          => 'date',
    ];

    public function getFullNameAttribute()
    {
        return $this->fname . ' ' . $this->lname;
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    private function activationCode()
    {
        // return 1234;
        return mt_rand(1111, 9999);
    }

    public function sendMailVerificationCode()
    {

        $this->update([
            'code' => $this->activationCode(),
        ]);

        $data = [
            'name' => $this->fname . ' ' . $this->lname,
            'msg'  => __('Your account activation code'),
            'code' => $this->code
        ];

        // Mail::to($this->email)->send(new VerificationMail($data));

        return true;
    }
}
