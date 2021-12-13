<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $table = 'bannerpages';
    protected $fillable = ['content','page','status', 'image'];
    public $timestamps=false;
    use HasFactory;
}
