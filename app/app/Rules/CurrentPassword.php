<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Cms\User;
use Illuminate\Support\Facades\Hash;

class CurrentPassword implements Rule
{
    private $user;

    /**
     * CurrentPassword constructor.
     * @param \App\Models\Cms\User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Hash::check($value, $this->user->password);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.current_password');
    }
}
