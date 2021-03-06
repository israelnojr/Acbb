<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

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
    protected $redirectTo;
    public function redirectTo()
    {
        if(\Auth::user()->hasAnyRoles(['superadmin', 'admin'])){
            $this->redirectTo = '/admin/users';
            return $this->redirectTo;
         }
         elseif(Auth::user()->hasAnyRoles(['zone_cordinator'])){
             $this->redirectTo = '/admin/users/zone';
             return $this->redirectTo;
         }
         else{
             $this->redirectTo = '/';
             return $this->redirectTo;
         }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
