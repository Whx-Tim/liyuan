<?php

namespace App\Http\Controllers;


use App\Course;
use App\CourseComment;
use App\Found;
use App\Lost;
use App\PartTime;
use App\Post;
use App\Sell;
use App\TransportUser;
use App\User;
use App\Transport;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * 上传图片功能
     *
     * @param Request $request
     * @param string $name
     * @return string
     */
    protected function moveFile(Request $request, $name = 'img')
    {
        $file = $request->file($name);
        $name = sha1(time() . $file->getClientOriginalName()) . "." . $file->extension();
        $file->move('images', $name);
        $uri = '/images/' . $name;

        return $uri;
    }

    /**
     * 显示个人主页
     * 
     * @param User $user
     * @return mixed
     */
    public function showOwner(User $user)
    {
        return view('auth.ownerInformation',compact('user'));
    }

    /**
     * 显示修改个人信息页面
     *
     * @return mixed
     */
    public function showEditOwner()
    {
        return view('auth.updateOwner');
    }

    /**
     * 显示绑定邮箱页面
     *
     * @return mixed
     */
    public function showEmail()
    {
        return view('auth.bindingEmail');
    }

    /**
     * 显示绑定电话页面
     *
     * @return mixed
     */
    public function showPhone()
    {
        return view('auth.bindingPhone');
    }

    /**
     * 显示修改密码页面
     *
     * @return mixed
     */
    public function showPassword()
    {
        return view('auth.modifyPassword');
    }

    /**
     * 显示意见反馈页面
     * 
     * @return mixed
     */
    public function showFeedback()
    {
        return view('feedback');
    }

    /**
     * 显示招领信息发布页面
     *
     * @return mixed
     */
    public function showFoundPublish()
    {
        return view('found.publish');
    }

    /**
     * 发布招领信息
     *
     * @param Request $request
     * @return mixed
     */
    public function createFound(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'type' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        return Found::create($request->except('_token')) ? redirect('found') : redirect()->back();
    }

    /**
     * 显示失物信息发布页面
     *
     * @return mixed
     */
    public function showLostPublish()
    {
        return view('lost.publish');
    }

    /**
     * 添加失物信息
     * 
     * @param Request $request
     * @return mixed
     */
    public function createLost(Request $request)
    {
        $this->validate($request,[
            'info' => 'required',
            'type' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        return Lost::create($request->except('_token')) ? redirect('lost') : redirect()->back();
    }

    /**
     * 发布操场帖子
     * 
     * @param Request $request
     * @return mixed
     */
    public function createPlayground(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required'
        ]);
        
        return Post::create($request->except('_token')) ? redirect('playground') : redirect()->back();
    }

    /**
     * 添加课程交换信息  
     * 
     * @param Request $request
     * @return mixed
     */
    public function addExchange(Request $request)
    {
        $this->validate($request,[
            'name'          => 'required',
            'course_number' => 'required',
            'time'          => 'required',
            'teacher'       => 'required',
            'email'         => 'required|email'
        ]);

        return Course::create($request->except('_token')) ? redirect('exchange') : redirect()->back();
    }

    /**
     * 删除一条课程交换信息
     * 
     * @param Course $course
     * @return array
     * @throws \Exception
     */
    public function deleteExchange(Course $course)
    {
        return $course->delete() ? ['status' => 'success','message' => '成功删除'] : ['status' => 'error','message' => '删除失败'];
    }

    /**
     * 添加一条二手交易信息
     * 
     * @param Request $request
     * @return mixed
     */
    public function addSell(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'name'  => 'required',
            'price' => 'required',
            'email' => 'required',
        ]);
        if ($request->file('img')){
            $img = $this->moveFile($request);
            $request = $request->except('_token');
            $request['img'] = $img;
        } else {
            $request = $request->except('_token');
        }


        return Sell::create($request) ? redirect('sell') : redirect()->back();
    }

    /**
     * 删除一条二手交易信息
     * 
     * @param Sell $sell
     * @return array
     * @throws \Exception
     */
    public function deleteSell(Sell $sell)
    {
        return $sell->delete() ? ['status' => 'success'] : ['status' => 'error'];
    }

    /**
     * 添加一条兼职信息
     * 
     * @param Request $request
     * @return mixed
     * 
     */
    public function addPartTime(Request $request)
    {
        $this->validate($request,[
            'title'   => 'required',
            'address' => 'required',
            'salary'  => 'required',
            'time'    => 'required',
            'phone'   => 'required',
            'email'   => 'required',
        ]);
        
        return PartTime::create($request->except('_token')) ? redirect('partTime') : redirect()->back();
    }

    /**
     * 删除一条兼职信息
     * 
     * @param PartTime $partTime
     * @return array
     * @throws \Exception
     */
    public function deletePartTime(PartTime $partTime)
    {
        return $partTime->delete() ? ['status' => 'success'] : ['status' => 'error'];
    }

    /**
     * 显示兼职信息编辑页面
     * 
     * @param PartTime $partTime
     * @return mixed
     */
    public function showEditPartTime(PartTime $partTime)
    {
        return view('wanshiwu.partTime.edit',compact('partTime'));
    }

    public function editPartTime(PartTime $partTime,Request $request)
    {
        $this->validate($request,[
            'title'   => 'required',
            'address' => 'required',
            'salary'  => 'required',
            'time'    => 'required',
            'phone'   => 'required',
            'email'   => 'required'
        ]);
        
        return $partTime->update($request->except(['_token','_method'])) ? redirect('partTime/detail/'.$partTime->id) : redirect()->back();
    }

    /**
     * 显示快递帮取详情页面
     *
     * @param Transport $transport
     * @return mixed
     */
    public function showTransportDetailAccept(Transport $transport,Request $request)
    {
        $transport->condition = true;
        $transport->save();
        TransportUser::create(['user_id' => $request->input('user_id'),'transport_id' => $transport->id]);

        return view('wanshiwu.transport.detail',compact('transport'));
    }

    /**
     * 显示快递详情页面
     * 
     * @param Transport $transport
     * @return mixed
     */
    public function showTransportDetail(Transport $transport)
    {
        return view('wanshiwu.transport.detail',compact('transport'));
    }
    
    public function addTransport(Request $request)
    {
        $this->validate($request,[
            'address'          => 'required',
            'time'             => 'required',
            'reward'           => 'required',
            'company'          => 'required',
            'consignee'        => 'required',
            'phone'            => 'required',
            'consigneeAddress' => 'required',
        ]);
        
        return Transport::create($request->except('_token')) ? redirect('transport') : redirect()->back();
    }

    /**
     * 取消快递订单
     * 
     * @param Transport $transport
     * @return mixed
     */
    public function cancelTransport(Transport $transport)
    {
        $transport->condition = false;
        $transport->save();
        $id = $transport->transport_user->id;
        return TransportUser::where('id',"$id")->delete() ? redirect('transport') : redirect()->back();
    }

    /**
     * 删除一条快递信息
     * 
     * @param Transport $transport
     * @return array
     * @throws \Exception
     */
    public function deleteTransport(Transport $transport)
    {
        return $transport->delete() ? ['status' => 'success'] : ['status' => 'error'];
    }
    
    public function commentExchange(Request $request)
    {
        $this->validate($request,[
            'name'          => 'required',
            'course_number' => 'required',
            'time'          => 'required',
            'teacher'       => 'required',
            'phone'         => 'required',
        ]);

        return CourseComment::create($request->except('_token')) ? redirect('exchange/detail/'.$request->input('course_id')) : redirect()->back();
    }

    /**
     * 删除课程交换中的一条评论
     * 
     * @param CourseComment $courseComment
     * @return array
     * @throws \Exception
     * 
     */
    public function deleteExchangeComment(CourseComment $courseComment)
    {
        return $courseComment->delete() ? ['status' => 'success'] : ['status' => 'error'];
    }
    
    public function showExchangeEdit(Course $course)
    {
        return view('wanshiwu.exchange.edit',compact('course'));
    }

    public function editExchange(Request $request,Course $course)
    {
        $this->validate($request,[
            'name'          => 'required',
            'course_number' => 'required',
            'time'          => 'required',
            'teacher'       => 'required',
            'phone'         => 'required|max:11|min:6',
        ]);

        return $course->update($request->except(['_token','_method'])) ? redirect('exchange/detail/'.$course->id) : redirect()->back();
    }
    
    public function showSellEdit(Sell $sell)
    {
        return view('wanshiwu.sellEdit',compact('sell'));
    }

    public function editSell(Request $request,Sell $sell)
    {
        $this->validate($request,[
            'title' => 'required',
            'name'  => 'required',
            'price' => 'required',
            'email' => 'required',
        ]);

        if($request->file('img')){
            $img = $this->moveFile($request);
            $request = $request->except(['_token','_method']);
            $request['img'] = $img;
        } else {
            $request = $request->except(['_token','_method']);
        }

        return $sell->update($request) ? redirect('sell/detail/'.$sell->id) : redirect()->back();
    }
}
