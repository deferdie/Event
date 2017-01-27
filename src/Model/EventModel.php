<?php

namespace deferdie\Event\Model;

use Illuminate\Database\Eloquent\Model;

class EventModel extends Model
{
  	protected $table = 'events';

  	protected $fillable = [
    	'user_id',
		'title',
		'date',
		'image',
		'description',
		'canBook',
		'active'
    ];
}
