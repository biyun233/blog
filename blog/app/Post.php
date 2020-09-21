<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function author(){
        return $this->belongsTo('APP\User','user_id');
    }
    //protected $table = 'posts';
    protected $fillable = ['post_title', 'post_content', 'post_name'];
    protected $primaryKey = 'id';
}
