<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//use Illuminate\Database\Eloquent\SoftDeletes;
class Marque extends Model
{
    // use SoftDeletes;
  protected $fillable=['name'];
  public function products() 
{ 
    return $this->hasMany(Product::class);
}
}
