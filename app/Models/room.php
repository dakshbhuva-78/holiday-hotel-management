<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    use HasFactory;
    protected $table='rooms';
    protected $fillable=['r_price','r_description','r_features','r_facilities','r_guests','r_image'];
}
