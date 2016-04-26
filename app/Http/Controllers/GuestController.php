<?php

namespace App\Http\Controllers;

use App\Course;
use App\Parttime;
use App\Sell;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    //
    public function sellHome(){
        $sells = DB::table('sells')->join('users','users.id','=','sells.user_id')
            ->select('users.username','sells.*')
            ->paginate(3);

        return view('wanshiwu.second_hand',compact('sells'));
    }

    public function showSellDetail(Sell $sell){
        return view('wanshiwu.sellDetail',compact('sell'));
    }

    public function showCourseHome(){
        $courses = Course::all();
        return view('wanshiwu.exchange.home',compact('courses'));

    }

    public function showCourseDetail(Course $course){
        return view('wanshiwu.exchange.detail',compact('course'));
    }

    public function showPartTime(){
        $parttimes = Parttime::paginate(3);
        return view('wanshiwu.partTime.home',compact('parttimes'));
    }

    public function showPartTimeDetail(){
        return view('wanshiwu.partTime.detail');
    }

    public function showPlayground(){
        return view('playground.home');
    }
}
