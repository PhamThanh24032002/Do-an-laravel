<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = ['name','status','parent_id'];
    public $timestamps = false;
    use HasFactory;
   public function chils(){
       return $this->hasMany(category::class,'parent_id','id');
   }
}
