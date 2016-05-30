<?php

namespace App\Http\Controllers;


use App\Course;
use App\CourseComment;
use App\Events\UserBindingEmail;
use App\Feedback;
use App\Found;
use App\Lost;
use App\PartTime;
use App\Post;
use App\Replie;
use App\Sell;
use App\TransportUser;
use App\User;
use App\Transport;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

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
     * 修改密码
     * 
     * @param Request $request
     * @param User $user
     * @return mixed
     */
    public function updatePassword(Request $request,User $user)
    {
        $this->validate($request,[
            'old_password' => 'required|min:6|max:20',
            'password' => 'required|confirmed'
        ]);
        if (Hash::check($request->input('old_password'),$user->password)){
            $user->update(['password' => bcrypt($request->input('password'))]);
            return redirect('owner/'.$user->id)->with(['status' => 'success','message' => '修改成功']);
        } else {
            return redirect()->back()->with(['status' => 'error','message' => '修改失败']);
        }
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
            'phone' => 'required|regex:/^1[34578]\d{9}$/',
        ]);
        if ($request->file('img')){
            $img = $this->moveFile($request);
            $request = $request->except('_token');
            $request['img'] = $img;
        } else {
            $request = $request->except('_token');
        }

        return Found::create($request) ? redirect('found')->with(['status' => 'success','message' => '发布成功']) : redirect()->back()->with(['status' => 'error','message' => '发布失败']);
    }

    /**
     * 删除招领信息
     * 
     * @param Found $found
     * @return array
     * @throws \Exception
     */
    public function deleteFound(Found $found)
    {
        return $found->delete() ? ['status' => 'success'] : ['status' => 'error'];
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
            'info'    => 'required',
            'type'    => 'required',
            'address' => 'required',
            'phone'   => 'required'
        ]);

        return Lost::create($request->except('_token')) ? redirect('lost')->with(['status' => 'success','message' => '发布成功']) : redirect()->back()->with(['status' => 'error','message' => '发布失败']);
    }

    /**
     * 删除失物信息
     *
     * @param Lost $lost
     * @return array
     * @throws \Exception
     */
    public function deleteLost(Lost $lost)
    {
        return $lost->delete() ? ['status' => 'success'] : ['status' => 'error'];
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
        
        return Post::create($request->except('_token')) ? redirect('playground')->with(['status' => 'success','message' => '发布成功']) : redirect()->back()->with(['status' => 'error','message' => '发布失败']);
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
            'course_number' => 'required|min:1000000000|max:10000000000|integer',
            'time'          => 'required',
            'teacher'       => 'required',
            'email'         => 'required|email',
            'phone'         => 'regex:/^1[34578]\d{9}$/'
        ]);

        return Course::create($request->except('_token')) ? redirect('exchange')->with(['status' => 'success','message' => '发布成功']) : redirect()->back()->with(['status' => 'error','message' => '发布失败']);
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
            'email' => 'required|email',
            'phone' => 'regex:/^1[34578]\d{9}$/'
        ]);
        if ($request->file('img')){
            $img = $this->moveFile($request);
            $request = $request->except('_token');
            $request['img'] = $img;
        } else {
            $request = $request->except('_token');
        }


        return Sell::create($request) ? redirect('sell')->with(['status' => 'success','message' => '发布成功']) : redirect()->back()->with(['status' => 'error','message' => '发布失败']);
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
            'phone'   => 'required|regex:/^1[34578]\d{9}$/',
            'email'   => 'required|email',
        ]);
        
        return PartTime::create($request->except('_token')) ? redirect('partTime')->with(['status' => 'success','message' => '发布成功']) : redirect()->back()->with(['status' => 'error','message' => '发布失败']);
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

    /**
     * 修改一条兼职信息
     *
     * @param PartTime $partTime
     * @param Request $request
     * @return mixed
     */
    public function editPartTime(PartTime $partTime,Request $request)
    {
        $this->validate($request,[
            'title'   => 'required',
            'address' => 'required',
            'salary'  => 'required',
            'time'    => 'required',
            'phone'   => 'required|regex:/^1[34578]\d{9}$/',
            'email'   => 'required|email'
        ]);
        
        return $partTime->update($request->except(['_token','_method'])) ? redirect('partTime/detail/'.$partTime->id)->with(['status' => 'success','message' => '修改成功']) : redirect()->back()->with(['status' => 'error','message' => '修改失败']);
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

    /**
     * 添加一条快递帮取信息
     *
     * @param Request $request
     * @return mixed
     */
    public function addTransport(Request $request)
    {
        $this->validate($request,[
            'address'          => 'required',
            'time'             => 'required',
            'reward'           => 'required',
            'company'          => 'required',
            'consignee'        => 'required',
            'phone'            => 'required|regex:/^1[34578]\d{9}$/',
            'consigneeAddress' => 'required',
        ]);
        
        return Transport::create($request->except('_token')) ? redirect('transport')->with(['status' => 'success','message' => '发布成功!请在个人主页处查看自己发布的信息']) : redirect()->back()->with(['status' => 'error','message' => '发布失败']);
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
        return TransportUser::where('id',"$id")->delete() ? redirect('transport')->with(['status' => 'success','message' => '成功取消该订单']) : redirect()->back()->with(['status' => 'error','message' => '取消失败']);
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

    /**
     * 添加一条课程交换评论信息
     *
     * @param Request $request
     * @return mixed
     */
    public function commentExchange(Request $request)
    {
        $this->validate($request,[
            'name'          => 'required',
            'course_number' => 'required|min:1000000000|max:10000000000',
            'time'          => 'required',
            'teacher'       => 'required',
            'phone'         => 'required|regex:/^1[34578]\d{9}$/',
        ]);

        return CourseComment::create($request->except('_token')) ? redirect('exchange/detail/'.$request->input('course_id'))->with(['status' => 'success','message' => '发布成功']) : redirect()->back()->with(['status' => 'error','message' => '发布失败']);
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
        return $courseComment->delete() ? redirect()->back()->with(['status' => 'success','message' => '删除成功！']) : redirect()->back()->with(['status' => 'error','message' => '删除失败！']);
    }

    /**
     * 显示课程交换编辑页面
     *
     * @param Course $course
     * @return mixed
     */
    public function showExchangeEdit(Course $course)
    {
        return view('wanshiwu.exchange.edit',compact('course'));
    }

    /**
     * 修改课程交换信息
     *
     * @param Request $request
     * @param Course $course
     * @return mixed
     */
    public function editExchange(Request $request,Course $course)
    {
        $this->validate($request,[
            'name'          => 'required',
            'course_number' => 'required|min:1000000000|max:10000000000',
            'time'          => 'required',
            'teacher'       => 'required',
            'phone'         => 'required|regex:/^1[34578]\d{9}$/',
        ]);

        return $course->update($request->except(['_token','_method'])) ? redirect('exchange/detail/'.$course->id)->with(['status' => 'success','message' => '修改成功']) : redirect()->back()->with(['status' => 'error','message' => '修改失败']);
    }

    /**
     * 显示二手交易编辑页面
     *
     * @param Sell $sell
     * @return mixed
     */
    public function showSellEdit(Sell $sell)
    {
        return view('wanshiwu.sellEdit',compact('sell'));
    }

    /**
     * 修改二手交易信息
     *
     * @param Request $request
     * @param Sell $sell
     * @return mixed
     */
    public function editSell(Request $request,Sell $sell)
    {
        $this->validate($request,[
            'title' => 'required',
            'name'  => 'required',
            'price' => 'required',
            'email' => 'required|email',
            'phone' => 'regex:/^1[34578]\d{9}$/'
        ]);

        if($request->file('img')){
            $img = $this->moveFile($request);
            $request = $request->except(['_token','_method']);
            $request['img'] = $img;
        } else {
            $request = $request->except(['_token','_method']);
        }

        return $sell->update($request) ? redirect('sell/detail/'.$sell->id)->with(['status' => 'success','message' => '修改成功']) : redirect()->back()->with(['status' => 'error','message' => '修改失败']);
    }

    /**
     * 保存意见反馈信息
     * 
     * @param Request $request
     * @return mixed
     */
    public function saveFeedback(Request $request)
    {
        $this->validate($request,[
            'title'   => 'required',
            'content' => 'required',
        ]);
        
        return Feedback::create($request->except('_token')) ? redirect('feedback')->with(['status' => 'success','message' => '反馈成功!']) : redirect()->back()->with(['status' => 'error','message' => '反馈失败！']);
    }

    /**
     * 显示快递帮取编辑页面
     *
     * @param Transport $transport
     * @return mixed
     */
    public function showEditTransport(Transport $transport)
    {
        return view('wanshiwu.transport.edit',compact('transport'));
    }

    /**
     * 修改快递帮取信息
     *
     * @param Request $request
     * @param Transport $transport
     * @return mixed
     */
    public function editTransport(Request $request,Transport $transport)
    {
        $this->validate($request,[
            'address'          => 'required',
            'time'             => 'required',
            'reward'           => 'required',
            'company'          => 'required',
            'consignee'        => 'required',
            'phone'            => 'required|regex:/^1[34578]\d{9}$/',
            'ConsigneeAddress' => 'required',
        ]);
        
        return $transport->update($request->except(['_token','_method'])) ? redirect()->back()->with(['status' => 'success','message' => '修改成功！']) : redirect()->back()->with(['status' => 'error','message' => '修改失败！']);
    }

    /**
     * 创建随机指定长度的数字，默认为6
     *
     * @param int $length
     * @return mixed
     */
    protected function createRandCodes($length = 6)
    {
        return mt_rand(pow(10,$length-1),pow(10,$length)-1);
    }

    /**
     * 发送邮箱验证码
     *
     * @param Request $request
     * @return array
     */
    public function sendEmail(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|unique:users'
        ]);

        $user_id = $request->input('user_id');
        Cache::put("{$user_id}codes",$this->createRandCodes(),10);

        event(new UserBindingEmail($request->input('email'),$user_id));

        return ['status' => 'success'];
    }

    /**
     * 绑定邮箱
     *
     * @param Request $request
     * @param User $user
     * @return mixed
     */
    public function bindingEmail(Request $request,User $user)
    {
        $this->validate($request,[
            'emailVerified' => 'required'
        ]);
        if ($request->input('emailVerified') == Cache::get("{$user->id}codes")){
            $user->emailVerified = true;
            $user->email = $request->input('sendEmail');
            $user->save();
            return redirect('owner/'.$user->id)->with(['status' => 'success','message' => '绑定成功！']);
        } else {
            return redirect()->back()->with(['status' => 'error','message' => '绑定失败！验证码不匹配！']);
        }
    }

    /**
     * 修改个人信息
     *
     * @param Request $request
     * @param User $user
     * @return mixed
     */
    public function updateOwnerInfo(Request $request,User $user)
    {
        $this->validate($request,[
            'stuNumber' => 'min:10|max:11',
        ]);

        return $user->update($request->except(['_token','_method'])) ? redirect('owner/'.$user->id)->with(['status' => 'success','message' => '修改成功！']) : redirect()->back()->with(['status' => 'error','message' => '修改失败！']);
    }

    /**
     * 更改二手交易的状态信息
     *
     * @param Sell $sell
     * @return array
     */
    public function exchangeSellCondition(Sell $sell)
    {
        $sell->condition = $sell->condition ? false : true ;
        $sell->save();
        return ['status' => 'success'];
    }
    
    public function addComment(Request $request)
    {
        $this->validate($request,[
            'content' => 'required'
        ]);
        
        return Replie::create($request->except('_token')) ? redirect()->back()->with(['status' => 'success','message' => '发布成功！']) : redirect()->back()->with(['status' => 'error','message' => '发布失败！']);
    }
}
