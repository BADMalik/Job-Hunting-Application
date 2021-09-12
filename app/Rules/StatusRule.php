<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
// use
use App\Models\Application;
class StatusRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $data;
    public function __construct($data)
    {
        //
        $this->data =$data;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $application = Application::find($this->data->id);
        return ($application->status!==$value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please Make Appropiate Changes to Application Status.';
    }
}
