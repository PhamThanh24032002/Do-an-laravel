<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reply_comments extends Model
{
    protected $table = 'reply_comments';
    protected $fillable = ['name_comment','reply_to','id_user','id_blog'];
    use HasFactory;
    
}
