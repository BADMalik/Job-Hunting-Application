<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use App\Rules\StatusRule;
use Illuminate\Foundation\Http\FormRequest;

class StatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
     return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
                'status'=>['required', new StatusRule($request)]
        ];
    }
    public function attributes()
    {
        return [
            'status' => __('different'),
        ];
    }
}
