<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;


class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('admin.profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        // dd(Auth::user());
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_profile' => __('You are not allowed to change data for a default user.')]);
        }
        $skillsarray  =  '';
        foreach($request->required_skills as $skill)
        {
            $skillsarray.=(int)$skill .',';
        }
            $skillsarray=rtrim($skillsarray,',');
        $request->merge(['skills'=>$skillsarray]);

        User::find(Auth::user()->id)->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
            if (auth()->user()->id == 1) {
                return back()->withErrors(['not_allow_password' => __('You are not allowed to change the password for a default user.')]);
            }

        auth()->user()->update(['password' => Hash::make($request->get('password'))]);
        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
