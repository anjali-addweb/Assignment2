<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cateories extends Model
{
    protected $table="categories";
    public $timestamps=false;
    protected $fillable=['cate_name'];
}
