<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    public function redirectTo()
    {

        // User role
        $role = Auth::user()->role;

        // Check user role
        switch ($role) {
            case 'Patient':
                return '/';
                break;
            case 'Doctor':
                return '/doctor';
                break;
            case 'Admin':
                return '/admin';
                break;
            default:
                return '/login';
                break;
        }
    }

    // protected $redirectTo = "/";
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $this->_registerorLoginUser($user);

        return redirect()->to('/');
    }

    protected function _registerorLoginUser($data)
    {
        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        }
        Auth::login($user);
    }

    // public function authenticate(Request $request)
    // {
    //     $email = $request['email'];
    //     $password = $request['password'];

    //     if (Auth::attempt(['email' => $email, 'password' => $password, 'isApproved' => 1])) {
    //         $request->session()->regenerate();

    //         return redirect()->intended('/doctor');
    //     }

    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',
    //     ])->onlyInput('email');
    // }
}
