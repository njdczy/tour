<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as Ori;

class FormRequest extends Ori
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
            'inputChild.*'  => 'required',
            'inputID.*'     => 'identitycards',
            'inputHeight.*' => 'required',
            'inputWeight.*' => 'required',
            'inputSchool.*' => 'required',
            'inputParent' => 'required',
            'inputTel'    => 'required',
            'inputAddress' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'inputChild.*.required'  => '请输入小孩名字',
            'inputID.*.identitycards'  => '身份证格式错误',
            'inputHeight.*.required'  => '请输入小孩身高',
            'inputWeight.*.required'  => '请输入小孩体重',
            'inputSchool.*.required'  => '请输入学校名称',


            'inputParent.required'  => '请家长姓名',
            'inputTel.required'  => '请输入手机',
            'inputAdress.required'  => '请输入家庭住址',

        ];
    }
}
