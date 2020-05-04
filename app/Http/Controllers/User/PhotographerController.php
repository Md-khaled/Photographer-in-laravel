<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Helpers\StringHelper;
use App\Models\Profile;
use App\Models\User;
use App\Models\Price;
use App\Models\Hire;
use App\Models\Photo;
use App\Models\Rating;
use Carbon\Carbon;
use View;
class PhotographerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['store']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
       
          $todayDate = date('Y-m-d');
        //return $todayDate;
      $validator = Validator::make($request->all(), [
            //'name' => 'required',
            //'email' => 'required',
            //'phone' => 'required',
            //'address' => 'required',
              //'start_date' => 'required|date_format:Y-m-d|after_or_equal:'.$todayDate,
            'category_id' => 'required',
            'start_date' => 'required|date_format:Y-m-d|after_or_equal:now',
            'nday' => 'required',
            'total' => 'required',
            'transaction_id' => 'required',
          ]);
       
          if ($validator->passes())
          {
             $dd=Carbon::parse($request->start_date)->addDays($request->nday-1);

            $dd=$dd->format('Y-m-d');
           //return $dd;
            $startTime=$request->start_date;
            $endTime=$dd;
//             $eventsCount = Hire::where(function ($query) use ($startTime, $endTime) {
//  $query->where(function ($query) use ($startTime, $endTime) {
//     $query->where('start_date', '>=', $startTime)
//             ->where('end_date', '<', $startTime);
//     })
//     ->orWhere(function ($query) use ($startTime, $endTime) {
//         $query->where('start_date', '<', $endTime)
//                 ->where('end_date', '>=', $endTime);
//     });
// })->count();
            //     $eventsCount = Hire::where('start_date','<=', $request->start_date)
            // ->where('end_date','>=', $request->end_date)
            //  ->count();
             $eventsCount = Hire::where('start_date','<=', $startTime)
             ->where('end_date','>=', $endTime)->orwhereBetween('start_date', array($startTime, $endTime))->orwherebetween('end_date', [$startTime,$startTime])->get();
                //return $eventsCount;
                if (!$eventsCount) {
                     if(!$request->ajax())
                    {
                      session()->flash('msg','Given dates already booked.Choose another date');
                      return redirect()->back();
                    }
                    return \Response::json(['success'=>'Given dates already booked.Choose another date']);
                }else{

             Hire::create(['user_id' => $request->user_id, 'photographer_id' => $request->photographer_id, 'category_id' => $request->category_id, 'start_date' => $startTime, 'end_date' => $endTime,'total'=>$request->total,'transaction_id'=>$request->transaction_id]);
             if(!$request->ajax())
            {
              session()->flash('msg','Record create successfully');
              return redirect()->back();
            }
            return \Response::json(['success'=>'Data is successfully added']);
      
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile=Profile::where('user_id', $id)->get();
        $photos=Photo::with('category')->where('user_id', $id)->limit(6)->get();
        $photographer=User::find($id);
        $comments=Rating::with('user')->get();
        //return $photos;
        return view('photographer.home.land',compact(['profile','photos','photographer','comments']));
    }
     public function collection($id)
    {

        $photos=Photo::with('category')->where('user_id', $id)->limit(6)->get();
        $photographer=User::find($id);
         View::share('photographer',$photographer);
        //return $comments;
        return view('photographer.collection.collection',compact(['photos']));
    }
    public function review_product(Request $request, $id)
    {
        //return $id;
        $validator=Validator::make($request->all(),[
            'review'=>'bail|required',
            'rating'=>'bail|required',
        ]);
         if ($validator->fails())
        {
            if(!$request->ajax())
            {
              return redirect()->back()->withErrors($validator)->withInput();
            }
          return \Response::json(['success'=>false,'errors'=>$validator->errors()->all()]);
        }
        if (Rating::where('user_id', '=', Auth::id())->where('Photographer_id', '=', $id)->exists()) {
             if(!$request->ajax())
            {
              session()->flash('error','Your review already added');
              return redirect()->back();
            }
            return \Response::json(['error'=>'Your review already added']);
        }else{
            $request->request->add(['user_id' => Auth::id(),'photographer_id'=>$id]);
            Rating::create($request->all());
              if(!$request->ajax())
            {
              session()->flash('msg','Review added successfully');
              return redirect()->back();
            }
            return \Response::json(['success'=>'Review added successfully']);
          }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photos=Photo::with('category')->where('user_id', $id)->limit(6)->get();
        $photographer=User::find($id);
        $price=Price::with('category')->where('user_id', $id)->get();
        $booking=Hire::where('process','pending')->get();
        //return $price;
        return view('photographer.hire.hire',compact(['photographer','price','booking','photos']));
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
        
    }
}
