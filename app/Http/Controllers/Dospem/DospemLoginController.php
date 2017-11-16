<?php

namespace App\Http\Controllers\Dospem;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DospemLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:dospem')->except('logout');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function login(Request $request)
    {
        $this->validateLogin($request);
        
        if($this->guard()->attempt($this->credentials($request), $request->has('remember'))) {
            return redirect()->intended(route('dashboard.dospem'));
        }

        return $this->sendFailedLoginResponse($request);
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    }

    protected function credentials(Request $request)
    {
        return $request->only('email', 'password');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = ['email' => trans('auth.failed')];

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors($errors);
    }

    public function logout()
    {
        $this->guard()->logout();
        return redirect(route('login'));
    }

    protected function guard()
    {
        return Auth::guard('dospem');
    }
}
