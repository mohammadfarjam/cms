<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostCreateRequest extends FormRequest
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
        if ($this->input('slug')) {
            $this->merge(['slug' => make_slug($this->input('slug'))]);
        } else {
            $this->merge(['slug' => make_slug($this->input('title'))]);
        }
    }

    public function rules()
    {
        return [
            'title' => 'required|min:10',
            'slug'=>Rule::unique('posts')->ignore(request()->post),
            'description' => 'required',
            'status' => 'required',
            'first_photo' => 'required',
            'category' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'لطفا عنوان مطلب را مشخص نمایید.',
            'title.min' => 'عنوان مطلب باید بیش از 10 کاراکتر باشد.',
            'slug.unique' => 'این نام مستعار قبلا ثبت شده است.',
            'description.required' => 'لطفا بخش توضیحات مطلب را پر نمایید.',
            'status.required' => 'لطفا وضعیت مطلب را مشخص نمایید.',
            'first_photo' => 'لطفا تصویر اصلی مطلب را انتخاب نمایید.',
            'category' => 'لطفا دسته بندی مطلب را مشخص نمایید.',
        ];
    }
}
