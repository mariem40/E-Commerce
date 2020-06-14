<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use SoftDeletes;
    protected $fillable = [
         'name','slug'];
	
public function products()
{ 
    return $this->belongsToMany(Product::class); 
}	
}
