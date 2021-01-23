<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $fillable = ['user_id', 'title', 'content', 'category', 'thumb', 'created_at', 'updated_at'];
   public function author()
   {
        return $this->belongsTo(User::class, 'user_id');
   }
}
