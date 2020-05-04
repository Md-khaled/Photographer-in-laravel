<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth')->only(['query']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('frontend.contact.contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('frontend.about.about');
    }
    public function query()
    {
        $queries=Contact::all();
          return view('admin.query.query-list',compact('queries'));
    }
    public function services()
    {
          return view('frontend.service.service');
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
            'name' => ['required','min:5','string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:contacts'],
            'tel' => ['required','unique:contacts','regex:/(01)[0-9]{9}/'],
            'query' => ['required','min:5','string', 'max:255'],
            'message' => ['required','min:10','string', 'max:300'],
          ]);
       
          if ($validator->passes())
          {
            
             Contact::create($request->all());
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
