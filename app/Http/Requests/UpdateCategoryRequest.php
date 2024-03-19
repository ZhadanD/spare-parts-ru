<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'img' => 'file',
            'name' => 'required|string|max:20',
            'short_desc' => 'required|string|max:50',
            'desc' => 'required|string|max:100',
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Название категории не должно быть пустым!',
            'name.string' => 'Название категории должно быть строкой!',
            'name.max' => 'Название категории должно быть меньше 20 символов!',
            'short_desc.required' => 'Краткое описание категории не должно быть пустым!',
            'short_desc.string' => 'Краткое описание категории должно быть строкой!',
            'short_desc.max' => 'Краткое описание категории должно быть меньше 50 символов!',
            'img.file' => 'Изображение категории должно быть файлом!',
            'desc.required' => 'Описание категории не должно быть пустым!',
            'desc.string' => 'Описание категории должно быть строкой!',
            'desc.max' => 'Описание категории должно быть меньше 100 символов!',
        ];
    }
}
