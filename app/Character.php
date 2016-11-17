<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    //
	
	protected $fillable = ['name','cimage','origin','alliance','bio','age','blood','postauthor'];
}
