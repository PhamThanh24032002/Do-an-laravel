<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class map extends Model
{
    protected $table = 'maps';
    protected $fillable = ['links','status'];
    
    use HasFactory;
}
