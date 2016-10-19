<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationDetails extends Model
{
    protected $table = 'quotation_details';
	protected $guarded = ['id'];
	protected $fillable = [
		'item_id',
		'quotation_id',
		'price',
	];

	public function items(){
		return $this->hasMany('App\Item');
	}
}

