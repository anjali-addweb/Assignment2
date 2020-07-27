<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cateories;

class categoryController extends Controller
{
    public function index(){
    	$table=new cateories();
        $cat=$table::all();
    return view('add',['cat'=>$cat]);
    }
}
