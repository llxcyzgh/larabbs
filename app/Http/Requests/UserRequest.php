<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
//use Auth;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'         => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id(),
            'email'        => 'required|email',
            'introduction' => 'max:80',
        ];
    }

    // 自定义错误消息提示
    public function messages()
    {
        return [
            'name.required' => '用户名不能为空',
            'name.between'  => '用户名必须介于 3 - 25 个字符之间',
            'name.regex'    => '用户名只能由字母、数字、横线和下划线组成',
            'name.unique'   => '用户名已经被占用,请重新填写',
        ];
    }
}
