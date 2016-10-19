<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branches';
	protected $guarded = ['id'];
	protected $fillable = [
		'name',
		'address',
		'phone',
		'isActive'
	];

	public function user(){
		return $this->belongsTo('App\User');
	}
}
