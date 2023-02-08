<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;

use PragmaRX\Google2FAQRCode\Google2FA;

class RegisterController extends Controller
{

    use RegistersUsers {
        register as registration;
    }

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:191'],
            'last_name' => ['required', 'string', 'max:191'],
            'phone' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $email_verified_at = null;
        if($data['email_verified_at'] == 'si'){
            $email_verified_at = Carbon::now();
        }
        $last_login = Carbon::now();
        if($data['last_login'] == 'mas24'){
            $last_login = '2021-01-01 01:18:46';
        }
        return User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'role_id' => $data['role_id'],
            'email_verified_at' => $email_verified_at,
            'password' => Hash::make($data['password']),
            'google2fa_secret' => $data['google2fa_secret'],
            'last_login' => $last_login,
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $google2fa = app('pragmarx.google2fa');
        $registration_data = $request->all();
        $registration_data["google2fa_secret"] = $google2fa->generateSecretKey();
        $request->session()->flash('registration_data', $registration_data);
        // $QR_Image = $google2fa->getQRCodeInline(
        //     config('app.name'),
        //     $registration_data['email'],
        //     $registration_data['google2fa_secret']
        // );

        $twoFa = new Google2FA();
        $key = $twoFa->generateSecretKey();
        $QR_Image = $twoFa->getQRCodeInline(
            config('app.name'),
            $registration_data['email'],
            $registration_data['google2fa_secret']
        );
        
        return view('google2fa.register', ['QR_Image' => $QR_Image, 'secret' => $registration_data['google2fa_secret']]);
    }
    
    public function completeRegistration(Request $request)
    {        
        $request->merge(session('registration_data'));
        return $this->registration($request);
    }
}
