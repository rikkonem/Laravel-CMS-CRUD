<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function changePassword(Request $request) {

        if(!Hash::check(
            $request->get('current_password'), $request->user()->password, []) ||
            $request->get('new_password') != $request->get('confirm_password')) {
          return redirect('/settings/passwordChange')->with('status', 'Wrong password');
        }

        $request->validate([
           'current_password' => 'required',
            'new_password' => 'required|string|min:6'
        ]);

        $user = $request->user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();

        return redirect('/settings/passwordChange')->with('status', 'Password has been changed');

    }

    public function showChangeForm() {
        return view('settings.passwordChange');
    }
}
