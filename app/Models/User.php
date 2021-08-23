<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use SoftDeletes;
    use Notifiable;
    use HasMediaTrait;
    use Auditable;

    public const GENDER_RADIO = [
        'female' => 'female',
        'male' => 'male',
    ];

    public const MARITAL_STATUS_RADIO = [
        'Single'   => 'Single',
        'married'  => 'married',
        'divorced' => 'divorced',
        'widowed'  => 'widowed',
    ];

    public const DEGREE_RADIO = [
        'Literate without Certificate' => 'Literate without Certificate',
        'Primary Certificate'          => 'Primary Certificate',
        'middle school certificate'    => 'middle school certificate',
        'High School Certificate'      => 'High School Certificate',
        'Diploma'                      => 'Diploma',
        'Bachelors Degree'             => 'Bachelors Degree',
        'Masters Degree'               => 'Masters Degree',
    ];

    public $table = 'users';

    protected $appends = [
        'cv',
        'image',
    ];

    protected $hidden = [
        'remember_token',
        'password',
    ];

    protected $dates = [
        'email_verified_at',
        'identity_date',
        'dbo',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'user_type',
        'identity_number',
        'identity_date',
        'dbo',
        'city_id', 
        'phone',
        'address',
        'gender',
        'marital_status',
        'degree',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('id', 1)->exists();
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function userUserAlerts()
    {
        return $this->belongsToMany(UserAlert::class);
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    
    public function bigbrothers()
    {
        return $this->hasManys(User::class, 'specialist_id');
    } 

    public function getCvAttribute()
    {
        return $this->getMedia('cv')->last();
    }

    
    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();

        if ($file) {
            $file->url              = $file->getUrl();
            $file->thumbnail        = $file->getUrl('thumb');
            $file->preview          = $file->getUrl('preview'); 
        }

        return $file;
    }

    public function getIdentityDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setIdentityDateAttribute($value)
    {
        $this->attributes['identity_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDboAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDboAttribute($value)
    {
        $this->attributes['dbo'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
}
