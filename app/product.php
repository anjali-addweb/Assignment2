<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table="products";
    public $timestamps=false;
    protected $fillable=['p_name','cat_id','price','discount','color','image','status','desc'];
}
