<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class color extends Model
{
    protected $table='colors';
    protected $fillable=['name','values','status'];
    public $timestamps=false;
    use HasFactory;
}
