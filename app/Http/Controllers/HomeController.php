<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Price;
use App\Models\User;
use App\Models\Rating;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users=Category::with('prices.user.avg')->has('prices')->get();
       //return $users;
        $user=User::where('role',1)->where('status',1)->get();
         foreach ($users as $key => $value) {
            $users[$key]['ratings']=Rating::where('photographer_id',$value->id) ->groupBy('photographer_id')->avg('rating');
        }
       /* foreach ($users as $key => $value) {
            echo($value->id);
        }*/
       // return $users;
        //$ratings=Rating::where('photographer_id',2)->groupBy('photographer_id')->avg('rating');
         $topper=Rating::selectRaw('avg(rating) as rating, photographer_id')
          ->groupBy('photographer_id')
          ->havingRaw('AVG(rating) >= ?', [4])
          ->orderBy('rating', 'DESC')->with('userrating')->get();
        //return $topper;
        return view('frontend.home.land',compact(['users','topper']));
    }
    public function searchByLocation($id)
    {
        $users=[];

        $dists=Category::with(['prices.user.avg'])->has('prices')->get();
        //return $dists;
        foreach ($dists as $user) {
            foreach ($user->prices as $key=>$value) {
                if ($value->user!=null) {
               if ($value->user->district_id==$id) {
                $users[]=$value;
                }
                }
            }
           
        }
        foreach ($users as $user) {
          echo($user->name);
           
        }
       // return $users;
        //$ratings=Rating::where('photographer_id',2)->groupBy('photographer_id')->avg('rating');
        //return $users;
        return view('frontend.search.location',compact(['users']));
    }
}
