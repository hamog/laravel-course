<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title' => 'required|string|max:255|unique:posts',
            'body' => 'required|string|max:65000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'status' => 'required|boolean',
            'published_at' => 'nullable|date|date_format:Y/n/j',
            'tags' => 'nullable|array',
            'tags.*' => 'required|integer|min:1|exists:tags,id',
        ];
    }
}
