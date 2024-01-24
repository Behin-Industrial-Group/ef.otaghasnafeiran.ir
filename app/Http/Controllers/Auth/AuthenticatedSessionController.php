<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SMSController;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Cryptommer\Smsir\Classes\Smsir;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('welcome');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if($user->last_send_code_time){
            $last_time = Carbon::parse($user->last_send_code_time);
            $now = Carbon::now();
            $diff = $last_time->diffInMinutes($now);
            if($diff > 5){
                return response(trans("Code was expired"), 300);
            }
        }
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function sendLoginCode(Request $r, SMSController $sms){
        $r->validate([
            'mobile' => 'digits_between:10,11'
        ]);
        $mobile = $r->mobile;
        if(strlen($mobile) === 11){
            $mobile = substr($mobile, 1);
        }
        $user = User::where('email', $mobile)->first();
        if(!$user){
            return response(trans("user not found"), 402);
        }
        if($user->last_send_code_time){
            $last_time = Carbon::parse($user->last_send_code_time);
            $now = Carbon::now();
            $diff = $last_time->diffInMinutes($now);
            if($diff < 5){
                return response(trans("code was sended for you in last 2 minutes"));
            }
        }
        $code = rand('100000', '999999');
        $text = "کد یکبار مصرف جهت ورود به سامانه اتاق اصناف: $code";
        // $sms->send('09376922176', $text);
        $smsir = new Smsir(env('SMSIR_LINE_NUMBER'), env('SMSIR_API_KEY'));
        $send = $smsir->Send();
        $parameter = new \Cryptommer\Smsir\Objects\Parameters('code', $code);
        $parameters = array($parameter) ;
        $send->Verify($mobile, 187709, $parameters);
        
        // $send->Bulk($text, [$mobile], )
        $user->password = Hash::make($code);
        $user->last_send_code_time = Carbon::now();
        $user->save();
        return response(trans("sms sended"));
    }
}
