<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders_detail extends Model
{
    protected $table = 'orders_details';
    protected $fillable = ['quantity','price','profit', 'order_id','product_id','color_id','size_id'];
    use HasFactory;
}
