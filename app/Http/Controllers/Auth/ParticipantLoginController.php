<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ParticipantLoginController extends Controller
{
    //
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';
    protected $redirectTo = '/l_participant/home';

    public function __construct()
    {
        $this->middleware('guest:participant')->except('logout');
    }

    public function showLoginForm() {
        $url = url()->previous();
        return view('auth.participant_login')->with('url', $url);
    }

    public function Login(Request $request) {
        // Validate form date
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Attempt to log user in
        if (Auth::guard('participant')->attempt(['email' => $request->email, 'password' => $request->password],
            $request->remember)) {

            return redirect()->intended(route('l_participant.home'));
            //return redirect(session('link'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'))
            ->withErrors(['email' => 'These credentials do not match our records.']);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }
}
