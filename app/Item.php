<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
	protected $guarded = ['id'];
	protected $fillable = [
		'name',
		'description',
		'model',
		'price',
		'unit',
		'type'
	];

	public function images(){
		return $this->hasMany('App\ItemImage');
	}

	public function quotation_details(){
		return $this->belongsTo('App\QuotationDetails');
	}
}
