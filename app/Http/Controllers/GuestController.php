<?php

namespace App\Http\Controllers;

use App\Course;
use App\Found;
use App\Lost;
use App\PartTime;
use App\Post;
use App\Sell;
use App\Transport;
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

    /**
     * 显示二手交易详情页面
     * 
     * @param Sell $sell
     * @return mixed
     */
    public function showSellDetail(Sell $sell){
        $sell->count++;
        $sell->save();
        return view('wanshiwu.sellDetail',compact('sell'));
    }

    /**
     * 显示课程交换主页
     * 
     * @return mixed
     */
    public function showCourseHome(){
        $courses = Course::all();
        return view('wanshiwu.exchange.home',compact('courses'));

    }

    /**
     * 显示课程交换详情页面
     * 
     * @param Course $course
     * @return mixed
     */
    public function showCourseDetail(Course $course){
        return view('wanshiwu.exchange.detail',compact('course'));
    }

    /**
     * 显示兼职信息主页
     * 
     * @return mixed
     */
    public function showPartTime(){
        $partTimes = PartTime::paginate(15);
        return view('wanshiwu.partTime.home',compact('partTimes'));
    }

    /**
     * 显示兼职信息详情页面
     * 
     * @param Parttime $partTime
     * @return mixed
     */
    public function showPartTimeDetail(PartTime $partTime){
        $partTime->count++;
        $partTime->save();
        return view('wanshiwu.partTime.detail',compact('partTime'));
    }

    /**
     * 显示快递帮取主页
     * 
     * @return mixed
     */
    public function showTransport()
    {
        $transports = Transport::orderBy('condition')->paginate(9);
        return view('wanshiwu.transport.home',compact('transports'));
    }
    

    /**
     * 显示操场主页
     * 
     * @return mixed
     */
    public function showPlayground()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(15);
        return view('playground.home',compact('posts'));
    }
    
    public function showPlaygroundDetail(Post $post)
    {
        $post->count++;
        $post->save();
        return view('playground.detail',compact('post'));
    }

    /**
     * 显示招领信息主页
     * 
     * @return mixed
     */
    public function showFound()
    {
        $founds = Found::paginate(6);
        return view('found.home',compact('founds'));   
    }

    /**
     * 显示招领信息详情页面
     * 
     * @param Found $found
     * @return mixed
     */
    public function showFoundDetail(Found $found)
    {
        return view('found.detail',compact('found'));
    }

    /**
     * 显示失物信息页面
     * 
     * @return mixed
     */
    public function showLost()
    {
        $losts = Lost::paginate(15);
        return view('lost.home',compact('losts'));
    }

    /**
     * 显示失物信息详情页面
     * 
     * @param Lost $lost
     * @return mixed
     */
    public function showLostDetail(Lost $lost)
    {
        return view('lost.detail',compact('lost'));
    }
}
