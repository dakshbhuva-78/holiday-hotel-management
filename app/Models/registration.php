<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registration extends Model
{
    use HasFactory;
    protected $table='registrations';
    protected $fillable=['u_name','u_email','u_phone','u_password','u_image','u_status','u_token'];
}
