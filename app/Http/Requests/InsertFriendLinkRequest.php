<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class InsertFriendLinkRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'name'=>'required',
            'url'=>'active_url',
            'logo'=>'required',
            'status'=>'required',
            'descr'=>'required'
            
        ];
    }
    public function messages()
    {
        return [
        'name.required'=>'友链名称不能为空',
        'url.active_url'=>'必须为有效链接',
        'logo.required'=>'网站LOGO不能为空',
        'status.required'=>'网站状态不能为空',
        'descr.required'=>'网站描述不能为空'

        ];
    }
}
