<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
    	'author_id', 'content'
    ];

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

}
