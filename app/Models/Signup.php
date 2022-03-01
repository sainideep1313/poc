<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signup extends Model
{
    use HasFactory;
    protected $primaryKey =('id');
    protected $fillable=['name','email','phone','username','password','lat','lng'];
}
