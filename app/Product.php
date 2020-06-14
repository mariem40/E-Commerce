<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
	use SoftDeletes;
    protected $fillable = [
        'code','name', 'price','image','stock', 'detail','marque_id'
    ];
public function categories()
{ 
    return $this->belongsToMany(Category::class); 
}
public function marque()
{ 
    return $this->belongsTo(Marque::class); 
}
public function images() 
{ 
    return $this->hasMany(Image::class);
}
}
