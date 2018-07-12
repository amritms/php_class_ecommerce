<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public $fillable = ['name', 'category', 'price'];

	/**
	 * product belongs to a category
	 */
	public function categories(){
		return $this->belongsTo('App\Category', 'category');

		// return $this->belongsTo(App\Category::class);
	}

	/**
	 * product has many tags
	 */
	public function tags(){
		return $this->belongsToMany('App\Tag');
	}
    
}
