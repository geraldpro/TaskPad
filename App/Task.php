<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Task extends Model
{
    //

  protected $table = 'tasks';
 	protected $fillable = ['title', 'description', 'user#_id'];

    public function user(){

    return $this->belongsTo('App\User','user_id');


    }




}
