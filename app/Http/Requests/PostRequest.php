<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PostRequest extends FormRequest
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
            'title'       => ['required', 'min:3', 'max:200'],
            'slug'        => ['max:200', 'unique:categories'],
            'excerpt'     => ['max:500'],
            'content_raw' => ['required', 'string', 'min:5', 'max:10000'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
        ];
    }

    /**
     * Generate slug from title before validation
     */
    public function prepareForValidation()
    {
        if ($this->has(['slug', 'title']) && $this->filled('title') && !$this->filled('slug')) {
            $this->request->set('slug', Str::slug($this->title));
        }
    }
}
