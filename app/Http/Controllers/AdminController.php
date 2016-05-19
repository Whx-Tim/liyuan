<?php

namespace App\Http\Controllers;

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
}
