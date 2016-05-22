<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
    protected $fillable  = ['zip', 'street', 'country', 'city', 'state', 'price', 'description'];


    public function associatePhoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }


    public static function locatedAt($zip, $street)
    {
        $street = str_replace('-', ' ', $street);

        return static::where(compact('zip', 'street'))->firstOrFail();
    }


    public function getPriceAttribute($price)
    {
        return '$' . number_format($price);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
