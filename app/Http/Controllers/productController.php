<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\product;
use App\cateories;
class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index(Request $request)
    {
        $pricefrom=$request->input('start_price');
        $priceto = $request->input('end_price');
        $input1=$request->input('discount');
        if($request->has('brand') && !empty($request->brand) &&empty($request->discount)&&(empty($pricefrom && $priceto))){
             //dd($request->input()); 
            $input=$request->input('brand');
            $brand=cateories::all();
            $data=product::whereIn('cat_id',$input)->get();
        } 
        if(($request->has('brand')&&!empty($request->brand))&&($request->has('discount')&& !empty($request->discount) &&(empty($pricefrom && $priceto)) )){
            $input1=$request->input('discount');

            $input=$request->input('brand');
             //dd($input1,$input);
            $brand=cateories::all();
        
            $data=product::WhereIn('discount',$input1)
            ->WhereIn('cat_id',$input)->get();

        }   
        if($request->has('discount') && !empty($request->discount)&&empty($request->brand)&&empty($pricefrom && $priceto)){
            $input1=$request->input('discount');

             //dd($input1,$input);
            $brand=cateories::all();
            $data=product::whereIn('discount',$input1)->get();
             return view('template',compact('data','brand'));

         }    
    
            if(empty($request->brand)&& $request->has('start_price') && $request->has('end_price') && !empty($pricefrom) && !empty($priceto)&&empty($request->discount))
           {
            
           
             $brand=cateories::all();
             $data=product::where('price','>=',$pricefrom)
            ->where('price','<=',$priceto)->get();
            
           }
             if($request->has('brand') && !empty($request->brand)&& $request->has('start_price') && $request->has('end_price') && !empty($pricefrom) && !empty($priceto)&&empty($request->discount))
           {
            
            $input=$request->input('brand');
            $pricefrom=$request->input('start_price');
            $priceto = $request->input('end_price');
             $brand=cateories::all();
             $data=product::whereIn('cat_id',$input)
                ->whereBetween('price',[$pricefrom,$priceto])->get();
          
           }
           if($request->has('brand') && !empty($request->brand)&& $request->has('start_price') && $request->has('end_price') && !empty($pricefrom) && !empty($priceto)&&$request->has('discount')&& !empty($request->discount))
           {
            
            $input=$request->input('brand');
            $pricefrom=$request->input('start_price');
            $priceto = $request->input('end_price');
            $input1=$request->input('discount');
             $brand=cateories::all();
             $data=product::whereIn('cat_id',$input)
                ->whereBetween('price',[$pricefrom,$priceto])
                ->whereIn('discount',$input1)->get();
          
           }
      
      
          elseif(empty($request->brand)&&empty($pricefrom && $priceto)&&empty($request->discount)){
                    $data=product::all();
                    $brand=cateories::all();
                    
                }
            return view('template',compact('data','brand','pricefrom','priceto'));
             
           
                     
             
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create(Request $request)
    {
        // $pricefrom=$request->input('start_price');
        //     $priceto = $request->input('end_price');
            
        //     $brand=cateories::all();
        //      $data=product::where('price','>=',$pricefrom)
        //     ->where('price','<=',$priceto)->get();     
           
    }
    public function display(Request $request)
    {

        // $pricefrom=$request->input('start_price');
        //     $priceto = $request->input('end_price');
        //   $brand=cateories::all();
        //      $data=product::orderBy('price')->get();
        //     return view('template',compact('data','brand')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $product=array(

        'image'=>$new_name,
        'p_name' =>$request->pname,
        'cat_id'=>$request->cid,
        'price'=>$request->price,
        'discount'=>$request->discount,
        'status'=>1,
        'color'=>$request->color,
        'desc'=>$request->desc,
);
        product::create($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data=product::findOrFail($id);
        if($data->discount!=0)
        {
            $newprice=$data->price-($data->discount/100)*$data->price;
            $color=product::where('p_name','=',$data->p_name)->get();
            return view('single',compact('data','newprice','color'));
        }
        $color=product::where('p_name','=',$data->p_name)->get();
        return view('single',compact('data','color'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('single');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
