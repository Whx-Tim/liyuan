<?php

namespace App\Http\Controllers;

use App\User;
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
}
