<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    protected $table = 'favorites';
    protected $fillable = ['user_id', 'product_id'];
    use HasFactory;
}
