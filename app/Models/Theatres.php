<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theatres extends Model
{
    use HasFactory;
    protected $fillable  = [
        'name','starttime','endtime','price','seatsAvailable','seats'
    ];
}
