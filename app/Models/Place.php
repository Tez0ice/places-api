<?php

namespace App\Models;

use App\Models\Review;
use App\Models\Facility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Place extends Model
{
    use HasFactory;


    // mass asssignment vulnerabilites 
    // means only this attributes or fields can be fill together.

    protected $fillable = [
        'name',
        'address',
        'email',
        'phone_number',
        'image_url',
        'description',        
    ];

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function facilities(){
        return $this->belongsToMany(Facility::class);
    }

}
