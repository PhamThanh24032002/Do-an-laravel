<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'bannerCategories';
    protected $fillable = ['name','links','position','status', 'image'];
    use HasFactory;
}
    