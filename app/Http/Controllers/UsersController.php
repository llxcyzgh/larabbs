<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Handlers\ImageUploadHandler;

class UsersController extends Controller
{
    public function __construct()
    {

    }

    // 显示用户个人信息页面
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // 显示修改用户信息页面
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // 执行修改用户信息动作
    public function update(UserRequest $request, ImageUploadHandler $uploader, User $user)
    {
//        dd($request->avatar); // 测试
//        dd($request->file(avatar));

        $data = $request->all();// 这个 $data 包含 'file'键, 值是一个对象
//        dd($data);

        if ($request->avatar) {
            $result = $uploader->save($request->avatar, 'avatars', $user->id,362);
            if ($result) {
                $data['avatar'] = $result['path'];
            }
        }

//        dd($data);

        $user->update($data);

        // 此处 redirect()->with() 是保存在session中的,不同于 view()->with()
        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功~');
    }


}
