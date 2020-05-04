<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\District;
use App\Models\Hire;
use App\Models\Photo;
use App\Models\Price;
use BD;
class DashboardController extends Controller
{
     public function index()
    {
    	$countuser= District::withCount('users')->has('users')->get();
    	/*$totaluser=User::where(function($query){
			   $query->where('role', 1)
			      ->orWhere('role', 2);
			})->count();*/
	     $totaluser=User::selectRaw("count(case when role = '1' OR role = '2' then 1 end) as total")
	     ->selectRaw("count(case when role = '1' then 1 end) as photographer")
	     ->selectRaw("count(case when role = '2' then 1 end) as user")->first();

    	//return $totaluser;
	     $totalorder=Hire::where('photographer_id',Auth::id())->orwhere('user_id',Auth::id())->selectRaw("count(case when process = 'pending' OR process = 'completed' then 1 end) as total")
	     ->selectRaw("count(case when process = 'pending' then 1 end) as pending")
	     ->selectRaw("count(case when process = 'completed' then 1 end) as completed")->first();
	    // $checkuser= User::whereId(Auth::id())->get(['title', 'about_me']);
	     $checkuser=User::select('title','about_me')->whereId(Auth::id())->first();
	     //return $checkuser;
	     if (!$checkuser->title ||!$checkuser->about_me) {
	     	//return $checkuser;
	     	session()->flash('danger1','Please update your profile info.Specially title or about_me fields');
	     }
	     $pricecheck = Price::where('user_id', Auth::id())->exists();
	     $photocheck = Photo::where('user_id', Auth::id())->exists();
	     if (!$pricecheck || !$photocheck) {
	     	session()->flash('danger2','Please Manage your photo and Price option.Otherwise your profile not visble to public');
	     }
	     	
    	//return $checkuser->title;
	     $array[] = ['District', 'Number of user'];
	     $chatuser=user::all();
	     foreach($countuser as $key => $value)
	     {
	      $array[++$key] = [$value->name, $value->users_count];
	     }
	        return view('admin.home.dashboard',compact('array','totaluser','totalorder','chatuser'));
	    }
}
