<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;
use App\Models\User;
use View;
class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.chat.chat-list');
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
    public function chat_to_user($id)
    {

       Chat::where('from_user_id',$id)->where('to_user_id',Auth::id())->decrement('status');
       /*$users=User::whereNotIn('id',[Auth::id()])->get();
       $countchat=0;
       foreach ($users as $key => $value) {
         $count=Chat::where('from_user_id',$value->id)->where('to_user_id',Auth::id())->where('status',1)->count();
         $users[$key]['unseen']=$count;
         $countchat+=$count;
         $to_user_id=$value->id;
         $chat_history=Chat::where(function ($query) use($to_user_id) {
               // return $id;
            $query->where('from_user_id', Auth::id())
                ->where('to_user_id',$to_user_id);
        })->orWhere(function($query) use($to_user_id) {
            $query->where('from_user_id',$to_user_id)
                ->where('to_user_id', Auth::id());})->latest()->first();
        $users[$key]['lastmsg']=$chat_history['message'];
       }
       foreach ($users as $key => $value) {
        if ($value->lastmsg!=null) {
          echo('<br>'.$value->id);
        }
        
       }
       $users['totalchat']=$countchat;*/
       //return $users;
        $to_user_id=$id;
            $chat_history=Chat::with('user')->with('photographer')->where(function ($query) use($to_user_id) {
               // return $id;
            $query->where('from_user_id', Auth::id())
                ->where('to_user_id',$to_user_id);
        })->orWhere(function($query) use($to_user_id) {
            $query->where('from_user_id',$to_user_id)
                ->where('to_user_id', Auth::id());})->get();
        //return $chat_history;
        return view('admin.chat.chat-list',compact('chat_history','to_user_id'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $to_user_id=$request->to_user_id;
       $validator = Validator::make($request->all(), [
            'message' => 'required',
          ]);
       
          if ($validator->passes())
          {
           $chat=Chat::create($request->all());
           $chat_history=Chat::with('user')->with('photographer')->where(function ($query) use($to_user_id) {
               // return $id;
            $query->where('from_user_id', Auth::id())
                ->where('to_user_id',$to_user_id);
        })->orWhere(function($query) use($to_user_id) {
            $query->where('from_user_id',$to_user_id)
                ->where('to_user_id', Auth::id());})->latest()->first();
             if(!$request->ajax())
            {
              session()->flash('msg','Record create successfully');
              return redirect()->back();
            }
            return \Response::json(['success'=>'Data is successfully added','chat'=>$chat_history]);
          }
          //return 'not access';
          if(!$request->ajax())
            {
              return redirect()->back()->withErrors($validator)->withInput();
            }
          return \Response::json(['success'=>false,'errors'=>$validator->errors()->all()]);
    }
    public function chat_message(Request $request, $id)
    {
      $to_user_id=$id;
      /*  //return Auth::id();
    $chat_history=Chat::where(function ($query) use($to_user_id) {
       // return $id;
    $query->where('from_user_id', Auth::id())
        ->where('to_user_id',$to_user_id);
})->orWhere(function($query) use($to_user_id) {
    $query->where('from_user_id',$to_user_id)
        ->where('to_user_id', Auth::id());})->latest()->get();
       // return $chat_history;
View::share('chat_history',$chat_history);*/
       $validator = Validator::make($request->all(), [
            'message' => 'required',
          ]);
       
          if ($validator->passes())
          {
           $chat=Chat::create($request->all() + ['to_user_id' =>$to_user_id]);
             if(!$request->ajax())
            {
              session()->flash('msg','Record create successfully');
              return redirect()->back();
            }
            return \Response::json(['success'=>'Data is successfully added','chat'=>$chat]);
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
         $to_user_id=$id;
        //return Auth::id();
            $chat_history=Chat::with('user')->with('photographer')->where(function ($query) use($to_user_id) {
               // return $id;
            $query->where('from_user_id', Auth::id())
                ->where('to_user_id',$to_user_id);
        })->orWhere(function($query) use($to_user_id) {
            $query->where('from_user_id',$to_user_id)
                ->where('to_user_id', Auth::id());})->get();
        return $chat_history;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        echo('a am acce success');
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
