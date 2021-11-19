<?php

namespace App\Http\Requests;

use App\Rules\ExistsOrZero;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:5', 'max:200'],
            'slug' => ['max:200'],
            'description' => ['string', 'max:500', 'min:3', 'nullable'],
            'parent_id' => ['required', 'integer', new ExistsOrZero]
        ];
    }
}