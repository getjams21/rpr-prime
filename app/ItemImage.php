<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemImage extends Model
{
    protected $table = 'item_images';
	protected $guarded = ['id'];
	protected $fillable = [
		'item_id',
		'link'
	];

	public function item(){
		return $this->belongsTo('App\Item');
	}
}
