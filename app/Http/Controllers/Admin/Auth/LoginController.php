<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\Admin\Auth\LoginRequest;
use Carbon\Carbon;
use App\Models\LogActivity;
use Redirect;
use Socialite;


class LoginController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('web');
    }

    /**
     * show login form
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * @param $driver
     * @return mixed
     */
    public function redirectToProvider($driver)
    {

        return Socialite::driver($driver)->redirect();
    }

    /**
     * @param $driver
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleProviderCallback($driver)
    {
        try {

            $user = Socialite::driver($driver)->user();

        } catch (\Exception $e) {
            return redirect()->route('login.get');
        }

        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            auth()->login($existingUser, true);
        } else {

            $newUser                    = new User;
            $newUser->provider_name     = $driver;
            $newUser->provider_id       = $user->getId();
            $newUser->name              = $user->getName();
            $newUser->email             = $user->getEmail();
            $newUser->email_verified_at = now();
            $newUser->save();

            auth()->login($newUser, true);
        }

        return redirect($this->redirectTo);
    }


    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
//    public function authenticate(LoginRequest $request)
//    {
//        $credentials = $request->only('email', 'password');
//        if ( $this->guard()->attempt($credentials)) {
//            // Authentication passed...
//            return redirect()->intended('/admin/home')->with('success', 'Đăng Nhập Tài Khoản Thành Công!');
//        }else {
//            return Redirect::back()->withInput();
//        }
//    }

    public function logout()
    {
        $this->guard()->logout();
        //Auth::logout();
        return redirect('admin/login');
    }

}
