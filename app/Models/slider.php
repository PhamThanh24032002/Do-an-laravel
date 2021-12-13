<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    protected $table = 'sliders';
    protected $fillable = ['name','link','status', 'position','image'];
    public $timestamps = false;
    use HasFactory;
}
