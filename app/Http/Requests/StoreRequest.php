<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'title' => ['required|title|unique:member'. ($id ? ",id,$id" : '')],
            'title' =>'required|unique:moives',
            'poster' =>['nullable','image', 'max:200'],
            'intro'  =>['required'],
            'release_date' => 'required|date|after_or_equal:' . now()->toDateString(),
        ];
    }
        // Thông báo lỗi
        
        public function messages()
        {
            return [
                'title.required' => 'Bạn phải nhập title',
                'title.unique' => 'Title đã tồn tại',
                'title.min'     => 'Title phải ít nhất 6 ký tự',
                'poster.image'   => 'Phải là hình ảnh',
                'poster.max'   => 'Poster Không được quá 200KB ',
                'intro.required'  => 'Bạn phải nhập intro',
                'release_date.required'  => 'Bạn phải nhập release_date',
                'release_date.after_or_equal'  => 'Bạn phải nhập date lớn hơn ngày hiện tại',
            ];
        }
    }


