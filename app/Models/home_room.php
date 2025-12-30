<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class home_room extends Model
{
    use HasFactory;
    protected $table='home_room';
    protected $fillable=['h_r_price','h_r_features','h_r_facilities','h_r_guests','h_r_image'];
}
