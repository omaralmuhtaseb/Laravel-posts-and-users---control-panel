<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable=['user_id', 'image','facebook','github','about'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
