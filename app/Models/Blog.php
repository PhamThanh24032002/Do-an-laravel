<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
    protected $fillable = ['title','content','status', 'image','blog_category_id','admin_id'];
    use HasFactory;
    public function category_blog(){
        return $this->belongsTo(Blog_category::class,'blog_category_id','id');
    }

}
