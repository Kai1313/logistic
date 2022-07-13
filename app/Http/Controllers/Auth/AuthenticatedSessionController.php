<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Agent;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.loginlte');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $auth = Auth::user();
        $agent = Agent::find($auth->agent_id);
        session(['roles'=>$auth->roles, 'agent_id'=>$auth->agent_id, 'user_name'=>$auth->name, 'agent_type'=>$agent->agent_type, 'agent_code'=>$agent->agent_code, 'agent_name'=>$agent->agent_name, 'agent_deposit'=>$agent->agent_deposit, 'user_id'=>$auth->id]);
        return redirect()->route('homes');
        // if ($auth->roles == -1) {
        // }
        // else {
        //     return redirect()->intended(RouteServiceProvider::HOME);
        // }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
