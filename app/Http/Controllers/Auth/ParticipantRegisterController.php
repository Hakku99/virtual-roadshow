<?php

namespace App\Http\Controllers\Auth;

use App\Participant;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class ParticipantRegisterController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    /*protected $redirectTo = '/home';*/
    protected $redirectTo = 'l_participant/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:participant');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showRegisterForm()
    {
        return view('auth.participant_register');
        //return view('admin.home');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:participants'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered(
            $participant = Participant::create([
                'name' => $request->all()['name'],
                'email' => $request->all()['email'],
                'address' => $request->all()['address'],
                'password' => Hash::make($request->all()['password']),
                'stamina' => 12,
                'points' => 0,
            ])
        ));

        /*Auth::loginUsingId($participant->id);*/
        $this->guard()->login($participant);

        /*return $this->registered($request, $participant)
            ?: redirect('/l_participant/home');*/

        return redirect('/l_participant/home');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $participant
     * @return mixed
     */
    protected function registered(Request $request, $participant)
    {
        //
        return Auth::loginUsingId($participant->id);
    }
}
