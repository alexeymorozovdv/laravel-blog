<?php

namespace App\Rules;

use App\Models\BlogCategory;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ExistsOrZero implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return BlogCategory|BlogCategory[]|bool|Collection|Model
     */
    public function passes($attribute, $value)
    {
        return BlogCategory::find($value) ?? $value == 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The parent category wasn\'t found';
    }
}
