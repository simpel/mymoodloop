<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoodComment extends Model
{
	public function valuation()
   	{
	   return $this->belongsTo('App\Mood');
   	}
}
