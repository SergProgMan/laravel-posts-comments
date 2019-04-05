<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function getShortTitle(){
        return str_limit($this->title, 50);
    }

    public function getShortContent(){
        return str_limit($this->content, 300);
    }
}
