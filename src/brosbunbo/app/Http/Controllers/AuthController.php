<?php namespace BunBo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Validation\ValidatesRequests;

class AuthController extends BaseController
{

    use ValidatesRequests;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');


        if ($this->auth->attempt($credentials, $request->has('remember'))) {
            $user = $this->auth->getUser();
            if(!$user->hasRole('admin')&&!$user->can('admin_permission')) {
                $this->auth->logout();

                $error = 'Please login with admin account.';
            } elseif (!$user->active) {
                $this->auth->logout();

                $error = 'This user has been deactivated, please contact the administrator.';
            }
        } else {
            $error = 'These credentials do not match our records.';
        }

        if(isset($error)) {
            return redirect(route('admin.login'))
                    ->withInput($request->only('email', 'remember'))
                    ->withErrors([
                        'error' => $error
                    ]);
        }

        return redirect()->intended(route('admin.home'))->withSuccess('You\'ve been logged in!');
    }

    public function logout()
    {
        $this->auth->logout();

        return redirect(route('admin.login'))
                ->withSuccess('You\'ve been logged out!');
    }
}