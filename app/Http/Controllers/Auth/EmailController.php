<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmailController extends Controller
{
    public function changeEmail(Request $request) {

        if(!Hash::check(
                $request->get('password'), $request->user()->password, []) ||
            $request->get('current_email') != $request->user()->email) {
            return redirect('/settings/emailChange')->with('status', 'Wrong password or email');
        }

        $request->validate([
            'password' => 'required|string|min:6',
            'new_email' => 'required|string|email|max:255',
            'current_email' => 'required'
        ]);

        $user = $request->user();
        $user->email = $request->get('new_email');
        $user->save();

        return redirect('/settings/emailChange')->with('status', 'Email has been changed');

    }

    public function showChangeForm() {
        return view('settings.emailChange');
    }
}
