<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Helpers\StringHelper;
use App\Models\Category;
use App\Models\Photo;
class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::select('id','name')->get();
        $products=Photo::where('user_id',Auth::id())->latest('id')->get();
        //return $products;
        return view('admin.photo.photo-list',compact(['category','products']));
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
       // return $request->file('photo');
         $validator = Validator::make($request->all(), [
            'title' => 'required|unique:photos,title',
            'categorid' => 'required',
            'photo' => 'bail|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
          ]);
       
          if ($validator->passes())
          {
            
             $img=$request->file('photo');
            // return uniqid('img_',true).$img->getClientOriginalName();
            $product_name=uniqid('img_',true).$img->getClientOriginalName();
//return $product_name;
            $img->storeAs('public/admin/img/fileupload',$product_name);
            //return $product_name;
            $data = $request->all();

            $data['photo'] ='storage/app/public/admin/img/fileupload/'.$product_name;
            $data['category_id']=$request->categorid;
            $data['content']=$request->description;
            $data['user_id']=Auth::id();
            unset($data['categorid']);
            unset($data['description']);
           // return $data;
            $phots=Photo::create($data);
             //return $data;
            //return 'access';
            return \Response::json(['success'=>'Data is successfully added','photos'=>$phots]);
          }
          //return 'not access';
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
         $photo = Photo::find($id);
          return view('admin.photo.photo-edit',compact(['category','photo']));

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
            'title' => 'required|unique:photos,title,'.$id,
            'category_id' => 'required',
            'photo' => ($request->file('photo'))?'bail|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048':'',
            'description' => 'required',
          ]);

         if ($validator->fails())
        {
           return redirect()->back()->withErrors($validator)->withInput();
        }
         
         $product_name='';
         $form_data=$request->except(['_token','_method']);
         $form_data['content']=$request->description;
          unset($form_data['description']);
        // return $form_data;
        if ($request->file('photo')) {
            $img=$request->file('photo');
            $product_name=uniqid('img_',true).$img->getClientOriginalName();
            $img->storeAs('public/admin/img/fileupload',$product_name);
            $form_data['photo']='storage/app/public/admin/img/fileupload/'.$product_name;
        }
        //return $form_data;
        Photo::whereId($id)->update($form_data);
        session()->flash('msg','Photo Updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Photo::find($id);
        unlink($product->photo);
        $product->delete();
        session()->flash('msg','Photo Deleted successfully');
        return redirect()->back();
    }
}
