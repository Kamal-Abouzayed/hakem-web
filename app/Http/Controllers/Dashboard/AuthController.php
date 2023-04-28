<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        $pageTitle = 'تسجيل الدخول';

        return view('dashboard.auth.login', compact('pageTitle'));
    }

    public function login(Request $request)
    {
        //attempt to log admin
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended(route('dashboard.home'))->with('success', 'تم تسجيل الدخول بنجاح');
        }

        return redirect()->back()->withInput($request->only('email', 'remember'))->with('error', 'البريد الالكترونى او كلمة المرور غير صحيحة');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('dashboard.login_form');
    }

    public function reset()
    {
        $pageTitle = 'نسيت كلمة المرور ؟';

        return view('dashboard.auth.reset', compact('pageTitle'));
    }

    public function sendLink(Request $request)
    {
        $user = $this->userRepository->getWhere(['email' => $request->email])->first();

        if ($user) {

            $code = \rand(1111, 9999);

            $user->update(['code' => $code]);

            $data = [
                'link' => route('admin.changePassword', $code)
            ];

            Mail::to($user->email)->send(new ResetPassword($data));

            return redirect()->back()->with('success', __('models.link_sent'));
        } else {

            return redirect()->back()->with('error', __('models.email_not_found'));
        }
    }

    public function changePassword($code)
    {

        $user = $this->userRepository->getWhere(['code' => $code])->first();

        if ($user) {
            return view('dashboard.auth.changePassword', \compact('code'));
        } else {
            return \view('dashboard.auth.error');
        }
    }

    public function updatePassword(ResetRequest $request)
    {

        $user = $this->userRepository->getWhere(['code' => $request->code])->first();

        if ($user->isVerified == 1) {

            $newPassword = $user->update(['password' => bcrypt($request->password)]);
        }

        if ($newPassword) {

            Auth::login($user);

            $user->update(['code' => null]);

            return \redirect(\route('admin.home'))->with('success', __('models.pass_changed'));
        } else {
            return redirect()->back()->with('error', __('models.pass_error'));
        }
    }
}
