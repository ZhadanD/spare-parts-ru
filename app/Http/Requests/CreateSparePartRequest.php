<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSparePartRequest extends FormRequest
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
            'img' => 'required|file',
            'name' => 'required|string|max:20',
            'short_desc' => 'required|string|max:50',
            'desc' => 'required|string|max:100',
            'status' => 'required|string|max:20',
            'category' => '',
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Название запчасти не должно быть пустым!',
            'name.string' => 'Название запчасти должно быть строкой!',
            'name.max' => 'Название запчасти должно быть меньше 20 символов!',
            'short_desc.required' => 'Краткое описание запчасти не должно быть пустым!',
            'short_desc.string' => 'Краткое описание запчасти должно быть строкой!',
            'short_desc.max' => 'Краткое описание запчасти должно быть меньше 50 символов!',
            'img.required' => 'Изображение запчасти не должно быть пустым!',
            'img.file' => 'Изображение запчасти должно быть файлом!',
            'desc.required' => 'Описание запчасти не должно быть пустым!',
            'desc.string' => 'Описание запчасти должно быть строкой!',
            'desc.max' => 'Описание запчасти должно быть меньше 100 символов!',
            'status.required' => 'Статус запчасти не должен быть пустым!',
            'status.string' => 'Статус запчасти должен быть строкой!',
            'status.max' => 'Статус запчасти должен быть меньше 20 символов!',
        ];
    }
}
