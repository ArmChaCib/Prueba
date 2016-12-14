<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';

    protected $fillable=
    [
    	'comment','user_id','project_id',
    ];


    public function projects(){
        return $this->beLongsTo('App\Project');
    }

    public function user(){
        return $this->beLongsTo('App\User');
    }
}
