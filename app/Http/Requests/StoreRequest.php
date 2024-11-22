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
        'title' => ['required', 'min:6', 'unique:movies,title'], // Validate title phải duy nhất trong bảng movies
        'poster' => ['nullable', 'image', 'max:2048'], // Poster không quá 2MB
        'intro' => ['required', 'min:6'], // Intro không được để trống và ít nhất 6 ký tự
        'release_date' => ['required', 'date', 'after_or_equal:' . now()->toDateString()], // Ngày công chiếu không nhỏ hơn ngày hiện tại
    ];
}

public function messages()
{
    return [
        'title.required' => 'Bạn phải nhập title.',
        'title.min' => 'Title phải có ít nhất 6 ký tự.',
        'title.unique' => 'Title đã tồn tại, vui lòng chọn tên khác.',
        'poster.image' => 'Poster phải là một hình ảnh.',
        'poster.max' => 'Poster không được vượt quá 2MB.',
        'intro.required' => 'Bạn phải nhập phần giới thiệu.',
        'intro.min' => 'Phần giới thiệu phải có ít nhất 6 ký tự.',
        'release_date.required' => 'Bạn phải nhập ngày công chiếu.',
        'release_date.date' => 'Ngày công chiếu phải là một ngày hợp lệ.',
        'release_date.after_or_equal' => 'Ngày công chiếu không được nhỏ hơn ngày hiện tại.',
    ];
}

}
