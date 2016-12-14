<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'task';

    protected $fillable=
    [
    	'title','description','start','end','user_id','project_id',
    ];

    public function user()
    {
    	return $this->beLongsTo('App\User');
    }

    public function project()
    {
    	return $this->beLongsTo('App\Project');
    }
}
