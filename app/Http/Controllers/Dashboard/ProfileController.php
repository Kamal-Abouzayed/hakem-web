<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $pageTitle = 'الملف الشخصى';

        $user = Auth::user();

        return view('dashboard.profile', compact('user', 'pageTitle'));
    }

    public function updateProfile(ProfileRequest $request)
    {
        $user = Auth::user();

        $data = $request->except('_token', '_method');

        if ($request->hasFile('image')) {

            Storage::delete($user->image);

            $data['image'] = $request->file('image')->store('user');
        }

        if ($request->password) {
            $data['password'] = \bcrypt($request->password);
        } else {
            $data['password'] = $user->password;
        }

        $user->update($data);

        return redirect()->back()->with('success', 'تم تعديل البيانات بنجاح');
    }
}
