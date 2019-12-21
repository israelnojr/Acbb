<?php

namespace App\Http\Controllers\Auth;

use App\Role;
use App\User;
use App\State;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

  use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        else{
            $this->redirectTo = '/';
            return $this->redirectTo;
        }
    }

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'sponsor' => ['required'],
            'state_of_origin' => ['required'],
            'local_government' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        // dd($data);
        $user = User::create([
            'name' => $data['name'],
            'sponsor' => $data['sponsor'],
            'state_of_origin' => $data['state_of_origin'],
            'local_government' => $data['local_government'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $role = Role::select('id')->where('name', 'user')->first();
        $user->roles()->attach($role);

        return $user;
    }

    public function showRegistrationForm()
    {
        $state = State::where('name', 'anambra')->first();
        $localGovernments = State::where('name', 'anambra')->first()->localGovernments()->get();
        $zones = Role::where('name', 'zone_cordinator')->first()->users()->get();
        return view('auth.register', compact('zones', 'state', 'localGovernments'));
    }
}
