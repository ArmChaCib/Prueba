<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	protected $table = 'projects';

    protected $fillable=
    [
    	'title','description','start','end','user_id','project_id',
    ];


    public function tasks(){
        return $this->hasMany('App\Task');
    }

    public function user(){
        return $this->beLongsTo('App\User');
    }
}
