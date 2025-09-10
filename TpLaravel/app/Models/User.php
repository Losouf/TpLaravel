<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\Encryptable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Dish::class, 'favorites')
                    ->using(Favorite::class)
                    ->withTimestamps();
    }
}
