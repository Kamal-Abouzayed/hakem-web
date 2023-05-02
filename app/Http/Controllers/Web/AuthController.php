<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\RegisterRequest;
use App\Repositories\Contract\CountryRepositoryInterface;
use App\Repositories\Contract\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $user = $this->userRepo->create($data);

        session('email', $user->email);

        Auth::login($user);

        return redirect()->intended(route('web.home'))->with('success', __('Registration completed successfully'));
    }

    // public function verifyAccount()
    // {
    //     $pageTitle = __('Account Confirmation');

    //     return view('web.auth.verify', compact('pageTitle'));
    // }

    // public function verifySubmit(Request $request)
    // {

    //     $code = $request->code;

    //     $user = $this->userRepo->findWhere([['code', $code], ['email' , session('email')]]);

    //     if ($user) {
    //         # code...
    //     }

    //     return view('web.auth.verify', compact('pageTitle'));
    // }

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

    public function logout(Request $request)
    {
        Auth::logout();
        // $request->session()->invalidate();
        return redirect()->route('web.home')->with('success', __('Logged out successfully'));
    }
}
