<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function __construct()
    {

    }

    // 显示用户个人信息页面
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    // 显示修改用户信息页面
    public function edit(User $user)
    {

    }

    // 执行修改用户信息动作
    public function update(User $user)
    {

    }


}
