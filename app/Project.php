<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['nom', 'descriptif'];

    function user() {
        return $this->hasMany('App.User');
    }
}
