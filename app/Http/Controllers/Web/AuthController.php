<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\ChangePasswordRequest;
use App\Http\Requests\Web\ProfileRequest;
use App\Http\Requests\Web\RegisterRequest;
use App\Repositories\Contract\CountryRepositoryInterface;
use App\Repositories\Contract\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected $userRepo;
    protected $countryRepo;

    public function __construct(UserRepositoryInterface $userRepo, CountryRepositoryInterface $countryRepo)
    {
        $this->userRepo = $userRepo;
        $this->countryRepo = $countryRepo;
    }

    public function registerFrom()
    {
        $pageTitle = __('New user registration');

        $countries = $this->countryRepo->getAll(['column' => 'id', 'dir' => 'ASC']);

        return view('web.auth.register', compact('pageTitle', 'countries'));
    }

    public function registerSubmit(RegisterRequest $request)
    {
        $data = $request->except('_token', 'check');

        if ($request->has('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user = $this->userRepo->create($data);

        Session::put('email', $user->email);

        // Auth::login($user);

        $user->sendMailVerificationCode();

        return redirect()->route('web.verify-account', ['type' => 'active-account'])->with('success', __('A verification code has been sent to your email'));
    }

    public function verifyAccount()
    {
        $pageTitle = __('Account Confirmation');

        return view('web.auth.verify', compact('pageTitle'));
    }

    public function verifySubmit(Request $request, $type)
    {

        $code = $request->code;

        $user = $this->userRepo->findWhere([['code', $code], ['email', session('email')]]);

        // dd($type);

        if ($user) {

            if ($type == 'active-account') {
                $user->update(['code' => null, 'isActive' => 1, 'email_verified_at' => now()]);

                Auth::login($user);

                return redirect()->intended(route('web.home'))->with('success', __('Registration completed successfully'));
            } else if ($type == 'forget-password') {

                // dd($type);

                Session::put('email', $user->email);

                $user->update(['code' => null]);

                return redirect()->route('web.change-password');
            } else {
                return redirect()->route('web.home');
            }
        } else {
            return redirect()->back()->with('error', __('The verification code is incorrect, please check the code and try again'));
        }
    }

    public function resendCode()
    {
        $user = $this->userRepo->findWhere([['email', session('email')]]);

        $user->sendMailVerificationCode();

        return redirect()->back()->with('success', __('A verification code has been sent to your email'));
    }

    public function loginForm()
    {
        $pageTitle = __('Login');

        return view('web.auth.login', compact('pageTitle'));
    }

    public function loginSubmit(Request $request)
    {
        //attempt to log admin
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended(route('web.home'))->with('success', __('Logged in successfully'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'))->with('error', __('The email or password is incorrect'));
    }

    public function forgetPassword()
    {
        $pageTitle = __('Forget Password');

        return view('web.auth.forget-password', compact('pageTitle'));
    }

    public function checkUser(Request $request)
    {
        $user = $this->userRepo->findWhere([['email', $request->email]]);

        if ($user) {

            Session::put('email', $user->email);

            $user->sendMailVerificationCode();

            return redirect()->route('web.verify-account', ['type' => 'forget-password'])->with('success', __('A verification code has been sent to your email'));
        } else {
            return redirect()->back()->with('error', __('A verification code has been sent to your email'));
        }
    }

    public function changePassword()
    {
        $pageTitle = __('Change Password');

        return view('web.auth.change-password', compact('pageTitle'));
    }

    public function changePasswordSubmit(ChangePasswordRequest $request)
    {
        $user = $this->userRepo->findWhere([['email', session('email')]]);

        $data = $request->except('_token');

        if ($user) {

            if ($request->has('password')) {
                $data['password'] = bcrypt($request->password);
            }

            $user->update($data);

            return redirect()->route('web.login')->with('success', __('Password changed successfully'));
        }
    }

    public function logout()
    {
        Auth::logout();
        // $request->session()->invalidate();
        return redirect()->route('web.home')->with('success', __('Logged out successfully'));
    }

    public function profile()
    {
        $pageTitle = __('Profile');

        $countries = $this->countryRepo->getAll(['column' => 'id', 'dir' => 'ASC']);

        $user = auth()->user();

        return view('web.profile', compact('pageTitle', 'countries', 'user'));
    }

    public function updateProfile(ProfileRequest $request)
    {
        $user = auth()->user();

        $data = $request->except('_token', '_method');

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $user->password;
        }

        $user->update($data);

        return redirect()->back()->with('success', __('Profile information has been modified successfully'));
    }
}
