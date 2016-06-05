<?php

namespace App\Http\Controllers;

use App\Course;
use App\Found;
use App\Information;
use App\Lost;
use App\PartTime;
use App\Post;
use App\Sell;
use App\Transport;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    
    public function index()
    {
        $info_1    = Information::where('type','学子天地')->orderBy('created_at','desc')->paginate(10);
        $info_2    = Information::where('type','校园生活')->orderBy('created_at','desc')->paginate(10);
        $info_3    = Information::where('type','行政通知')->orderBy('created_at','desc')->paginate(10);
        $info_4    = Information::where('type','周边信息')->orderBy('created_at','desc')->paginate(10);
        $info_5    = Information::where('type','重要通知')->orderBy('created_at','desc')->paginate(10);
        $partTimes = PartTime::Newest()->get();
        $courses   = Course::Newest()->get();
        $sells     = Sell::Newest()->get();
        $founds    = Found::Newest()->get();
        $losts     = Lost::Newest()->get();
        $posts     = Post::Newest()->get();
        
        return view('home',compact('info_1','info_2','info_3','info_4','info_5','partTimes','courses','sells','founds','losts','posts'));
    }
    //
    /**
     * 显示二手交易页面
     * 
     * @return mixed
     */
    public function sellHome(){
        $sells = Sell::paginate(15);

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
        $courses = Course::paginate(15);
        return view('wanshiwu.exchange.home',compact('courses'));

    }

    /**
     * 显示课程交换详情页面
     * 
     * @param Course $course
     * @return mixed
     */
    public function showCourseDetail(Course $course){
        $course->count++;
        $course->save();
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

    /**
     * 搜索课程交换
     *
     * @param Request $request
     * @return mixed
     */
    public function searchCourse(Request $request)
    {
        $courses = Course::search($request->input('key'))->orderBy('created_at','desc')->paginate(15);

        return view('wanshiwu.exchange.home',compact('courses'));
    }

    /**
     * 搜索二手交易
     *
     * @param Request $request
     * @return mixed
     */
    public function searchSell(Request $request)
    {
        $sells = Sell::search($request->input('key'))->orderBy('created_at','desc')->paginate(15);

        return view('wanshiwu.second_hand',compact('sells'));
    }

    /**
     * 搜索兼职信息
     *
     * @param Request $request
     * @return mixed
     */
    public function searchPartTime(Request $request)
    {
        $partTimes = PartTime::search($request->input('key'))->orderBy('created_at','desc')->paginate(15);

        return view('wanshiwu.partTime.home',compact('partTimes'));
    }

    /**
     * 搜索快递帮取
     *
     * @param Request $request
     * @return mixed
     */
    public function searchTransport(Request $request)
    {
        $transports = Transport::search($request->input('key'))->orderBy('condition')->paginate(9);

        return view('wanshiwu.transport.home',compact('transports'));
    }

    /**
     * 搜索招领信息
     *
     * @param Request $request
     * @return mixed
     */
    public function searchFound(Request $request)
    {
        $founds = Found::search($request->input('key'))->orderBy('created_at','desc')->paginate(10);

        return view('found.home',compact('founds'));
    }

    /**
     * 搜索失物信息
     *
     * @param Request $request
     * @return mixed
     */
    public function searchLost(Request $request)
    {
        $losts = Lost::search($request->input('key'))->orderBy('created_at','desc')->paginate(15);

        return view('lost.home',compact('losts'));
    }

    /**
     * 搜索操场信息
     *
     * @param Request $request
     * @return mixed
     */
    public function searchPlayground(Request $request)
    {
        $posts = Post::search($request->input('key'))->orderBy('created_at','desc')->paginate(15);

        return view('playground.home',compact('posts'));
    }

    public function showWeather()
    {
        //http://abletive.com/api/get_posts/?page=1&count=2
//        $ch = curl_init("http://wthrcdn.etouch.cn/weather_mini?city=深圳");
//        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//
//        $json = json_decode(curl_exec($ch));
//
//        dd($json);
//
//        curl_close($ch);
//        foreach ($json->data->forecast as $forecast){
//            echo $forecast->fengxiang;
//        }
        $client = new Client;
        $json = json_decode($client->get("http://wthrcdn.etouch.cn/weather_mini?city=深圳")->getBody()->getContents());
        $wendu = $json->data->wendu;
        $ganmao = $json->data->ganmao;
        for ($i=0;$i<5;$i++){
            switch ($json->data->forecast[$i]->type){
                case "多云":
                    $images[$i] = 'duoyun';
                    break;
                case "阵雨":
                    $images[$i] = 'zhenyu';
                    break;
                case "小雨":
                    $images[$i] = 'xiaoyu';
                    break;
                case "中雨":
                    $images[$i] = 'zhongyu';
                    break;
                case "雷阵雨":
                    $images[$i] = '15';
                    break;
                case "晴":
                default:
                    $images[$i] = '2';
                    break;
            }
        }
        $forecasts = $json->data->forecast;
        return view('weather',compact('wendu','ganmao','forecasts','images'));
    }

    public function showInformation(Information $information)
    {
        $information->count++;
        $information->save();

        return view('info-detail',compact('information'));
    }
}
