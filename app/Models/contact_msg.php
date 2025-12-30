<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact_msg extends Model
{
    use HasFactory;
    protected $table = 'contact_msgs';
    protected $fillable = ['name', 'email', 'subject', 'message'];
}
