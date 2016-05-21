<?php

namespace App\Http\Controllers;

use App\Course;
use App\PartTime;
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
     * 显示用户列表
     *
     * @return mixed
     */
    public function showUser()
    {
        $users = User::all();

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
        $courses = Course::all();
        
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
            'course_number' => 'required',
            'time'          => 'required',
            'teacher'       => 'required',
            'phone'         => 'required',
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
        return $course->delete() ? redirect()->back()->with(['status' => 'success','message' => '删除成功！']) : redirect()->back()->with(['status' => 'error','message' => '删除失败！']);
    }

    /**
     * 显示二手交易页面
     *
     * @return mixed
     */
    public function showSell()
    {
        $sells = Sell::all();

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
            'email' => 'required',
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
        $partTimes = PartTime::all();
        
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
            'phone'   => 'required',
            'email'   => 'required'
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
    
    public function showTransport()
    {
        $transports = Transport::all();
        
        return view('admin.transport.home',compact('transports'));
    }
    
    public function showEditTransport(Transport $transport)
    {
        return view('admin.transport.edit',compact('transport'));
    }
    
    public function showTransportDetail(Transport $transport)
    {
        return view('admin.transport.detail',compact('transport'));
    }
    
    
}
