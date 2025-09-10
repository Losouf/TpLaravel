<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Traits\Encryptable;

class Favorite extends Pivot
{
    protected $table = 'favorites';

    public $incrementing = false;

    public $timestamps = true;

    protected $fillable = ['user_id', 'dish_id'];

    protected $casts = [
        'user_id' => 'integer',
        'dish_id' => 'integer',
    ];

    public function user() { 
        return $this->belongsTo(User::class); 
    }
    
    public function dish() { 
        return $this->belongsTo(Dish::class); 
    }
}
