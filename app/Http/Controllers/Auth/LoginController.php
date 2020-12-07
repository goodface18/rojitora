<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Luggage;
use App\Emptycar;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //Sweet Futrue is customize

    public function username()
    {
        return "member_id";
    }

    protected function validateLogin(Request $request)
    {
        $this->validate(
            $request,
            [
                $this->username() => 'required',
                'password' => 'required',
            ],
            [
                'member_id.required' => '会員IDを入力してください。',
                'password.required' => 'パスワードが異なります。',
                // 'failed' => '会員IDとパスワードが異なります。'
            ]
        );
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        session(['luggage_num' => Luggage::count()]);
        session(['emptycar_num' => Emptycar::count()]);
        $data['luggage_num'] = session('luggage_num');
        $data['emptycar_num'] = session('emptycar_num');
        $data['latest_luggage'] = Luggage::latest()->first();
        $data['latest_emptytruck'] = Emptycar::latest()->first();
        return view('pages.index',$data);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $request->session()->put('login_error', trans('auth.failed'));
        throw ValidationException::withMessages(
            [
                'failed' => ["会員IDとパスワードが異なります。"],
            ]
        );
    }
    //End Customize

}
