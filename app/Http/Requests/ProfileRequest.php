<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
    // dd($request);
        return [
            'name' => ['required', 'min:3'],
            'user_name'=>['required','min:5'],
            'address'=>['required','min:10'],
            'description'=>['required','min:10'],
            'phone_no'=>['required',
                function ($attribute, $value, $fail) {
                if (User::where('phone_no',$value)->get()->count() > 0 && User::where('phone_no',$value)->first()->id !== Auth::user()->id) {
                    $fail('phone number'.' is already being used.');
                }},'regex:/[0-9]{3}[0-9]{3}[0-9]{4}/'],
            'qualification'=>['required'],
            'email' => ['required', 'email', Rule::unique((new User)->getTable())->ignore(auth()->id())],

        ];
    }
}
