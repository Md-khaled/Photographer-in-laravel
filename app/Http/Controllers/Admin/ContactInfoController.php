<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;

class ContactInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $profiles=Profile::where('user_id',Auth::id())->latest('id')->get();
        //return $profiles;
        return view('admin.contactinfo.contactinfo-list',compact(['profiles']));
    }
    public function profile()
    {
          $user=User::where('id',Auth::id())->latest('id')->first();
        //return $profiles;
        return view('admin.profile.profile-list',compact(['user']));
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
    public function profileUpdate(Request $request, $id)
    {
          $validator =Validator::make($request->all(), [
            'name' => ['required','min:5','string', 'max:255'],
            'mobile' => ['required','regex:/(01)[1-9]{9}/'],
            'image' =>  ($request->file('image'))?'bail|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048':'',
            'address' => ['required'],
        ]);
           if ($validator->passes())
          {
            $path='public/admin/img/profile';
            if(!Storage::exists($path)){
                Storage::makeDirectory($path);
            }
             $product_name='';
            $form_data = $request->except(['_token','_method']);;
            if ($request->file('image')) {
            $img=$request->file('image');
            $product_name=uniqid('img_',true).$img->getClientOriginalName();
            $img->storeAs($path,$product_name);
            $form_data['image']='storage/app/'.$path.'/'.$product_name;
            }
             
             $phots=User::whereId($id)->update($form_data);
             if(!$request->ajax())
            {
              session()->flash('msg','Data update successfully');
              return redirect()->back();
            }
            return \Response::json(['success'=>'Data is successfully update','poc'=>$phots]);
          }
         if(!$request->ajax())
            {
              return redirect()->back()->withErrors($validator)->withInput();
            }
          return \Response::json(['success'=>false,'errors'=>$validator->errors()->all()]);
    }
    public function aboutMe(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'aboutme' => 'required|min:100',
          ]);
       
          if ($validator->passes())
          {
            
              User::whereId($id)->update(['title' => $request->title, 'about_me' => $request->aboutme]);
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
     public function changePassword(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => ['required', 'string', 'min:8'],
            'confirm_password' => ['same:new_password'],
          ]);
       
          if ($validator->passes())
          {
             if(!\Hash::check($request['current_password'], auth()->user()->password)){
                if(!$request->ajax())
               {
             
                 return back()->with('error','You have entered wrong password');
                }
                return \Response::json(['error'=>'You have entered wrong password']);
            }else{
                 User::find($id)->update(['password'=> Hash::make($request->new_password)]);

             if(!$request->ajax())
            {
              session()->flash('msg','Record update successfully');
              return redirect()->back();
            }
            return \Response::json(['success'=>'Record update successfully']);
          }
            }
            
           
          //return 'not access';
          if(!$request->ajax())
            {
              return redirect()->back()->withErrors($validator)->withInput();
            }
          return \Response::json(['success'=>false,'errors'=>$validator->errors()->all()]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'title' => 'required|unique:profiles,title',
            'image' => 'bail|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
       
          if ($validator->passes())
          {
            $path='public/admin/img/profile';
            if(!Storage::exists($path)){
                Storage::makeDirectory($path);
            }
             $img=$request->file('image');
            // return uniqid('img_',true).$img->getClientOriginalName();
            $product_name=uniqid('img_',true).$img->getClientOriginalName();
            $img->storeAs($path,$product_name);
            //return $product_name;
            $data = $request->all();

            $data['image'] ='storage/app/'.$path.'/'.$product_name;
           // return $data;
            $phots=Profile::create($data);
             if(!$request->ajax())
            {
              session()->flash('msg','Profile create successfully');
              return redirect()->back();
            }
            return \Response::json(['success'=>'Data is successfully added','photos'=>$phots]);
          }
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
         $photo = Profile::find($id);
          return view('admin.contactinfo.contactinfo-edit',compact(['photo']));

        if($photo){
            return response()->json($photo, 200);
        }else {
            return response()->json('Data not found');
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
            'title' => 'required|unique:profiles,title,'.$id,
            'image' =>  ($request->file('image'))?'bail|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048':'',
          ]);
       
          if ($validator->passes())
          {
            $path='public/admin/img/profile';
            if(!Storage::exists($path)){
                Storage::makeDirectory($path);
            }
             $product_name='';
            $form_data = $request->except(['_token','_method']);;
            if ($request->file('image')) {
            $img=$request->file('image');
            $product_name=uniqid('img_',true).$img->getClientOriginalName();
            $img->storeAs($path,$product_name);
            $form_data['image']='storage/app/'.$path.'/'.$product_name;
            $pfl=Profile::find($id);
              unlink($pfl->image);
            }
              
             $phots=Profile::whereId($id)->update($form_data);
             if(!$request->ajax())
            {
              session()->flash('msg','Data update successfully');
              return redirect()->back();
            }
            return \Response::json(['success'=>'Data is successfully update','poc'=>$phots]);
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
         $product=Profile::find($id);
         unlink($product->image);
        $product->delete();
        
        session()->flash('msg','Data Deleted successfully');
        return redirect()->back();
    }
}
