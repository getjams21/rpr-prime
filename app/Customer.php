<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
	protected $guarded = ['id'];
	protected $fillable = [
		'first_name',
		'last_name',
		'MI',
		'address',
		'phone',
		'email',
		'contact_person',
		'TIN',
		'terms'
	];

	public function quotations(){
		return $this->hasMany('App\Quotation');
	}
}
