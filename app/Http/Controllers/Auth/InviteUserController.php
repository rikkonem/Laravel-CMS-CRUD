<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\InvitationRequest;
use App\Mail\Register;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class InviteUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function create() {

        return view('auth.invite');
    }

    public function send(InvitationRequest $request)
    {
            Mail::to($request->email)->send(new Register($request->role));

           return redirect('/')->with('status', 'Invitation Sent');
    }

}
