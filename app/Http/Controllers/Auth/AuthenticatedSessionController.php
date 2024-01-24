<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SMSController;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
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
    public function store(LoginRequest $request): RedirectResponse
    {
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
            'mobile' => 'digit'
        ]);
        $mobile = $r->mobile;
        if(strlen($mobile) === 11){
            $mobile = substr($mobile, 1);
        }
        $user = User::where('email', $mobile)->first();
        if(!$user){
            return response(trans("user not found"), 402);
        }
        $code = rand('100000', '999999');
        $text = "Code: $code";
        $sms->send('09376922176', $text);
        $user->password = Hash::make($code);
        $user->save();
    }
}
