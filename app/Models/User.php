<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'role',
        'follower',
        'following',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'user_activities', 'user_id', 'activity_id')->withPivot('type_id');
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function books()
    {
        return $this->belongsToMany(Book::class,'book_user','user_id','book_id')->withPivot('favorite','read','reading');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function requestNewBooks()
    {
        return $this->hasMany(RequestNewbook::class);
    }
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follows_id')->withTimestamps();
    }
    public function followings()
    {
        return $this->belongsToMany(User::class, 'followers', 'follows_id', 'user_id')->withTimestamps();
    }
}
