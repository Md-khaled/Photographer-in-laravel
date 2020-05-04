<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\District;
use App\Models\Category;
use App\Models\User;
use App\Models\Chat;
use Route;
use View;
class viewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->cc();
        $this->chat();
    }
     public function cc()
    {
      
      view()->composer(['frontend.include.navbar','frontend.home.land','photographer.hire.hire','frontend.search.location'], function($view)
        {
             //$id = Route::current()->getParameter('id');
            //$product=Product::where('id',$id)->get();
            $categories=Category::all();
            $districts=District::all();
            $view->with('categories',$categories)->with('districts',$districts);
        });
    }
     public function chat()
    {
      
      view()->composer(['admin.include.chat_bar','admin.include.header_nav'], function($view)
        {
             
            $photographers=User::with('district')->where('role','1')->get();
       $chatuser=User::whereNotIn('id',[Auth::id()])->get();
       $countchat=0;
       foreach ($chatuser as $key => $value) {
         $count=Chat::where('from_user_id',$value->id)->where('to_user_id',Auth::id())->where('status',1)->count();
         $chatuser[$key]['unseen']=$count;
         $countchat+=$count;
         $to_user_id=$value->id;
         $chat_history=Chat::where(function ($query) use($to_user_id) {
               // return $id;
            $query->where('from_user_id', Auth::id())
                ->where('to_user_id',$to_user_id);
        })->orWhere(function($query) use($to_user_id) {
            $query->where('from_user_id',$to_user_id)
                ->where('to_user_id', Auth::id());})->latest()->first();
        $chatuser[$key]['lastmsg']=$chat_history['message'];
       }
        $chatuser['totalchat']=$countchat;
            $view->with('photographers',$photographers)->with('chatuser',$chatuser);
        });
    }
}
