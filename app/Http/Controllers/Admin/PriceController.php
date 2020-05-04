<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Category;
use App\Models\Price;

class PriceController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::select('id','name')->get();
        $prices=Price::where('user_id',Auth::id())->latest('id')->get();
        //return $products;
        return view('admin.price.price-list',compact(['category','prices']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ip=2;
        $hostname=Auth::id();
        $validator = Validator::make($request->all(), [
        //     'category_id' => [ 'required', Rule::unique('prices')->where(function ($query) use($ip,$hostname) {
        //     return $query->where('category_id', $ip)
        //     ->where('user_id', $hostname);
        // }),],
            'categoryid'=>'required|unique:prices,category_id,NULL,id,user_id,'.$hostname,
            'dayprice' => 'required',
            'hourprice' => 'required',
          ],[
             'categoryid.unique' => 'Price already exist.Please choose another category',
          ]);
       
          if ($validator->passes())
          {
            
             Price::create(['user_id' => $request->user_id, 'category_id' => $request->categoryid, 'day_price' => $request->dayprice, 'hour_price' => $request->hourprice]);
             if(!$request->ajax())
            {
              session()->flash('msg','Record create successfully');
              return redirect()->back();
            }
            return \Response::json(['success'=>'Data is successfully added']);
          }
          //return 'not access';
          if(!$request->ajax())
            {
              return redirect()->back()->withErrors($validator)->withInput();
            }
          return \Response::json(['success'=>false,'errors'=>$validator->errors()->all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::select('id','name')->get();
         $price = Price::find($id);
          return view('admin.price.price-edit',compact(['category','price']));

        if($photo){
            return response()->json($photo, 200);
        }else {
            return response()->json('Task not found');
        }
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
        $validator = Validator::make($request->all(), [
            'dayprice' => 'required',
            'hourprice' => 'required',
          ]);
       
          if ($validator->passes())
          {
            
             Price::whereId($id)->update(['day_price' => $request->dayprice, 'hour_price' => $request->hourprice]);
             if(!$request->ajax())
            {
              session()->flash('msg','Record update successfully');
              return redirect()->back();
            }
            return \Response::json(['success'=>'Record update successfully']);
          }
          //return 'not access';
          if(!$request->ajax())
            {
              return redirect()->back()->withErrors($validator)->withInput();
            }
          return \Response::json(['success'=>false,'errors'=>$validator->errors()->all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Price::find($id);
        $product->delete();
        session()->flash('msg','Data Deleted successfully');
        return redirect()->back();
    }
}
