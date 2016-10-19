<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $table = 'quotations';
	protected $guarded = ['id'];
	protected $fillable = [
		'projectName',
		'customID',
		'customer_id',
		'user_id'
	];

	public function customer(){
		return $this->belongsTo('App\Customer');
	}

	public function quotation_details(){
		return $this->hasMany('App\QuotationDetails');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}
}
