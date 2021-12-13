<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    protected $table='sizes';
    protected $fillable=['name','status'];
    public $timestamps=false;
    use HasFactory;
}
