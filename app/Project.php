<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['nom', 'descriptif'];

    public function user() {
        return $this->belongsTo('App\User');
    }
    public function getUserAuteur() {
        return $this->user->firstname;
    }
}
