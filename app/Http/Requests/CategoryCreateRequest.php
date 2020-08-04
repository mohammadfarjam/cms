<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryCreateRequest extends FormRequest
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
//این کد برای اینکه مقدار slug که ما میخواهیم ذخیره کنیم اگر مقدار تکراری باشد این کار را انجام می دهد
    protected function prepareForValidation()
    {
        if ($this->input('slug')){
            $this->merge(['slug'=>make_slug($this->input('slug'))]);
        }else{
            $this->merge(['slug'=>make_slug($this->input('title'))]);
        }
    }

    public function rules()
    {
        return [
            'title'=>'required',
            'slug'=>Rule::unique('categories')->ignore(request()->category),
        ];
    }

    public function messages()
    { return[

        'title.required'=>'لطفا عنوان دسته بندی را مشخص کنید.',
        'slug'=>'این نام مستعار قبلا استفاده شده است.',
    ];

    }
}
