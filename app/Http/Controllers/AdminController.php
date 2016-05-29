<?php

namespace App\Http\Controllers;

use App\Course;
use App\Feedback;
use App\Found;
use App\Lost;
use App\PartTime;
use App\Post;
use App\Sell;
use App\Transport;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    //

    public function index()
    {
        return view('admin.home');
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
     * 显示用户列表
     *
     * @return mixed
     */
    public function showUser()
    {
        $users = User::paginate(15);

        return view('admin.user.home',compact('users'));
    }

    /**
     * 删除用户信息以及用户发布的所有信息
     *
     * @param User $user
     * @return mixed
     * @throws \Exception
     */
    public function deleteUser(User $user)
    {
        foreach($user->courses as $course){
            $course->delete();
        }
        foreach($user->courseComments as $courseComment){
            $courseComment->delete();
        }
        foreach($user->feedbacks as $feedback){
            $feedback->delete();
        }
        foreach($user->founds as $found){
            $found->delete();
        }
        foreach($user->losts as $lost){
            $lost->delete();
        }
        foreach($user->part_times as $part_time){
            $part_time->delete();
        }
        foreach($user->posts as $post){
            $post->delete();
        }
        foreach($user->Replies as $reply){
            $reply->delete();
        }
        foreach($user->sells as $sell){
            $sell->delete();
        }
        foreach($user->transports as $transport){
            $transport->delete();
        }
        foreach($user->TransportUsers as $transportUser){
            $transportUser->delete();
        }
        
        return $user->delete() ? redirect()->back()->with(['status' => 'success','message' => '删除成功！']) : redirect()->back()->with(['status' => 'error','message' => '删除失败！']);
    }

    /**
     * 显示课程交换列表
     * 
     * @return mixed
     */
    public function showCourse()
    {
        $courses = Course::paginate(15);
        
        return view('admin.course.home',compact('courses'));
    }

    /**
     * 显示课程交换编辑页面
     * 
     * @param Course $course
     * @return mixed
     */
    public function showEditCourse(Course $course)
    {
        return view('admin.course.edit',compact('course'));
    }

    /**
     * 显示课程交换详情页面
     * 
     * @param Course $course
     * @return mixed
     */
    public function showCourseDetail(Course $course)
    {
        return view('admin.course.detail',compact('course'));
    }

    /**
     * 修改课程交换信息
     * 
     * @param Request $request
     * @param Course $course
     * @return mixed
     */
    public function editCourse(Request $request,Course $course)
    {
        $this->validate($request,[
            'name'          => 'required',
            'course_number' => 'required|min:10|max:11',
            'time'          => 'required',
            'teacher'       => 'required',
            'phone'         => 'required|regex:/^1[34578]\d{9}$/',
        ]);
        
        return $course->update($request->except('_token')) ? redirect()->back()->with(['status' => 'success','message' => '修改成功!']) : redirect()->back()->with(['status' => 'error','message' => '修改失败！']);
    }

    /**
     * 删除课程交换信息
     * 
     * @param Course $course
     * @return mixed
     * @throws \Exception
     */
    public function deleteCourse(Course $course)
    {
        foreach ($course->comments as $comment){
            $comment->delete();
        }
        
        return $course->delete() ? redirect()->back()->with(['status' => 'success','message' => '删除成功！']) : redirect()->back()->with(['status' => 'error','message' => '删除失败！']);
    }

    /**
     * 显示二手交易页面
     *
     * @return mixed
     */
    public function showSell()
    {
        $sells = Sell::paginate(15);

        return view('admin.sell.home',compact('sells'));
    }

    /**
     * 显示二手交易编辑页面
     *
     * @param Sell $sell
     * @return mixed
     */
    public function showEditSell(Sell $sell)
    {
        return view('admin.sell.edit',compact('sell'));
    }

    /**
     * 显示二手交易详情页面
     *
     * @param Sell $sell
     * @return mixed
     */
    public function showSellDetail(Sell $sell)
    {
        return view('admin.sell.detail',compact('sell'));
    }

    /**
     * 修改二手交易信息
     *
     * @param Request $request
     * @param Sell $sell
     * @return mixed
     *
     */
    public function editSell(Request $request,Sell $sell)
    {
        $this->validate($request,[
            'title' => 'required',
            'name'  => 'required',
            'price' => 'required',
            'email' => 'required|email',
        ]);

        if($request->file('img')){
            $img = $this->moveFile($request);
            $request = $request->except(['_token','_method']);
            $request['img'] = $img;
        } else {
            $request = $request->except(['_token','_method']);
        }

        return $sell->update($request) ? redirect()->back()->with(['status' => 'success','message' => '修改成功']) : redirect()->back()->with(['status' => 'error','message' => '修改失败']);
    }

    /**
     * 删除二手交易信息
     *
     * @param Sell $sell
     * @return mixed
     * @throws \Exception
     */
    public function deleteSell(Sell $sell)
    {
        return $sell->delete() ? redirect()->back()->with(['status' => 'success','message' => '删除成功！']) : redirect()->back()->with(['status' => 'error','message' => '删除失败！']);
    }


    /**
     * 显示兼职信息页面
     *
     * @return mixed
     */
    public function showPartTime()
    {
        $partTimes = PartTime::paginate(15);
        
        return view('admin.partTime.home',compact('partTimes'));
    }

    /**
     * 显示兼职信息编辑页面
     *
     * @param PartTime $partTime
     * @return mixed
     */
    public function showEditPartTime(PartTime $partTime)
    {
        return view('admin.partTime.edit',compact('partTime'));
    }

    /**
     * 显示兼职信息详情页面
     *
     * @param PartTime $partTime
     * @return mixed
     */
    public function showPartTimeDetail(PartTime $partTime)
    {
        return view('admin.partTime.detail',compact('partTime'));
    }

    /**
     * 修改兼职信息
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

        return $partTime->update($request->except(['_token','_method'])) ? redirect()->back()->with(['status' => 'success','message' => '修改成功']) : redirect()->back()->with(['status' => 'error','message' => '修改失败']);
    }

    /**
     * 删除兼职信息
     *
     * @param PartTime $partTime
     * @return mixed
     * @throws \Exception
     */
    public function deletePartTime(PartTime $partTime)
    {
        return $partTime->delete() ? redirect()->back()->with(['status' => 'success','message' => '删除成功！']) : redirect()->back()->with(['status' => 'error','message' => '删除失败！']);
    }

    /**
     * 显示快递帮取页面
     *
     * @return mixed
     */
    public function showTransport()
    {
        $transports = Transport::paginate(15);
        
        return view('admin.transport.home',compact('transports'));
    }

    /**
     * 显示快递帮取编辑页面
     *
     * @param Transport $transport
     * @return mixed
     */
    public function showEditTransport(Transport $transport)
    {
        return view('admin.transport.edit',compact('transport'));
    }

    /**
     * 显示快递帮取详情页面
     *
     * @param Transport $transport
     * @return mixed
     */
    public function showTransportDetail(Transport $transport)
    {
        return view('admin.transport.detail',compact('transport'));
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
            'reward'           => 'required|integer',
            'company'          => 'required',
            'consignee'        => 'required',
            'phone'            => 'required|regex:/^1[34578]\d{9}$/',
            'ConsigneeAddress' => 'required',
        ]);

        return $transport->update($request->except(['_token','_method'])) ? redirect()->back()->with(['status' => 'success','message' => '修改成功！']) : redirect()->back()->with(['status' => 'error','message' => '修改失败！']);
    }

    /**
     * 删除快递帮取信息
     *
     * @param Transport $transport
     * @return mixed
     * @throws \Exception
     */
    public function deleteTransport(Transport $transport)
    {
        return $transport->delete() ? redirect()->back()->with(['status' => 'success','message' => '删除成功！']) : redirect()->back()->with(['status' => 'error','message' => '删除失败！']);
    }

    /**
     * 显示操场管理页面
     *
     * @return mixed
     */
    public function showPlayground()
    {
        $playgrounds = Post::paginate(15);

        return view('admin.playground.home',compact('playgrounds'));
    }

    /**
     * 显示操场管理详情页面
     *
     * @param Post $post
     * @return mixed
     */
    public function showPlaygroundDetail(Post $post)
    {
        return view('admin.playground.detail',compact('post'));
    }

    /**
     * 删除一条帖子
     *
     * @param Post $post
     * @return mixed
     * @throws \Exception
     */
    public function deletePlayground(Post $post)
    {
        foreach ($post->replies as $reply){
            $reply->delete();
        }

        return $post->delete() ? redirect()->back()->with(['status' => 'success','message' => '删除成功！']) : redirect()->back()->with(['status' => 'error','message' => '删除失败！']);
    }

    /**
     * 显示招领管理页面
     *
     * @return mixed
     */
    public function showFound()
    {
        $founds = Found::paginate(15);

        return view('admin.found.home',compact('founds'));
    }

    /**
     * 显示招领管理编辑页面
     *
     * @param Found $found
     * @return mixed
     *
     */
    public function showEditFound(Found $found)
    {
        return view('admin.found.edit',compact('found'));
    }

    /**
     * 显示招领管理详情页面
     *
     * @param Found $found
     * @return mixed
     */
    public function showFoundDetail(Found $found)
    {
        return view('admin.found.detail',compact('found'));
    }

    /**
     * 修改招领信息
     *
     * @param Request $request
     * @param Found $found
     * @return mixed
     */
    public function editFound(Request $request,Found $found)
    {
        $this->validate($request,[
            'name'    => 'required',
            'type'    => 'required',
            'address' => 'required',
            'phone'   => 'required|regex:/^1[34578]\d{9}$/'
        ]);
        if ($request->file('img')){
            $img = $this->moveFile($request);
            $request = $request->except(['_token','_method']);
            $request['img'] = $img;
        } else {
            $request = $request->except(['_token','_method']);
        }

        return $found->update($request) ? redirect()->back()->with(['status' => 'success','message' => '修改成功！']) : redirect()->back()->with(['status' => 'error','message' => '修改失败！']);
    }

    /**
     * 删除招领信息
     *
     * @param Found $found
     * @return mixed
     * @throws \Exception
     */
    public function deleteFound(Found $found)
    {
        return $found->delete() ? redirect()->back()->with(['status' => 'success','message' => '删除成功！']) : redirect()->back()->with(['status' => 'error','message' =>'删除失败！']);
    }

    /**
     * 显示失物管理页面
     *
     * @return mixed
     */
    public function showLost()
    {
        $losts = Lost::paginate(15);

        return view('admin.lost.home',compact('losts'));
    }

    /**
     * 显示失物管理编辑页面
     *
     * @param Lost $lost
     * @return mixed
     */
    public function showEditLost(Lost $lost)
    {
        return view('admin.lost.edit',compact('lost'));
    }

    /**
     * 显示失物管理详情页面
     *
     * @param Lost $lost
     * @return mixed
     */
    public function showLostDetail(Lost $lost)
    {
        return view('admin.lost.detail',compact('lost'));
    }

    /**
     * 修改失物信息
     *
     * @param Request $request
     * @param Lost $lost
     * @return mixed
     */
    public function editLost(Request $request,Lost $lost)
    {
        $this->validate($request,[
            'info'    => 'required',
            'type'    => 'required',
            'address' => 'required',
            'phone'   => 'required|regex:/^1[34578]\d{9}$/'
        ]);

        return $lost->update($request->except(['_token','_method'])) ? redirect()->back()->with(['status' => 'success','message' => '修改成功！']) : redirect()->back()->with(['status' => 'error','message' => '修改失败！']);
    }

    /**
     * 删除失物信息
     *
     * @param Lost $lost
     * @return mixed
     * @throws \Exception
     */
    public function deleteLost(Lost $lost)
    {
        return $lost->delete() ? redirect()->back()->with(['status' => 'success','message' => '删除成功！']) : redirect()->back()->whit(['status' => 'error' ,'message' => '删除失败！']);
    }


    /**
     * 显示意见反馈页面
     *
     * @return mixed
     */
    public function showFeedback()
    {
        $feedbacks = Feedback::paginate(15);

        return view('admin.feedback.home',compact('feedbacks'));
    }

    /**
     * 显示意见反馈详情页面
     *
     * @param Feedback $feedback
     * @return mixed
     */
    public function showFeedbackDetail(Feedback $feedback)
    {
        return view('admin.feedback.detail',compact('feedback'));
    }

    /**
     * 删除意见反馈
     *
     * @param Feedback $feedback
     * @return mixed
     * @throws \Exception
     */
    public function deleteFeedback(Feedback $feedback)
    {
        return $feedback->delete() ? redirect()->back()->with(['status' => 'success','message' => '删除成功！']) : redirect()->back()->with(['status' => 'error','message' => '删除失败！']);
    }
}
