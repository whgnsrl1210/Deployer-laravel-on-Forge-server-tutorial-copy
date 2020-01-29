<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    protected $dontFlash = ['files'];
    
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
            'title' => ['required'],
            'content' => ['required', 'min:10'],
            'files' => ['array'],
            'files.*' => ['mimes:jpg,png,zip,tar','max:30000'],
            //'tags' => ['required' , 'array'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'attribute: 는(은) 필수입력 항목입니다',
            'min' => ' attribute :는(은) 최소 :min 글자 이상이 필요합니다',
        ];
    }

    public function attributes()
    {
        return [
            'title' => '제목',
            'content' => '본문',
        ];
    }

}
