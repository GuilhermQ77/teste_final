<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Prefer explicit redirect provided by the login form (modal).
        $redirectTo = $request->input('redirect_to');
        if (!empty($redirectTo)) {
            // Normalize and ensure it's the same host (avoid open redirect)
            $parsed = parse_url($redirectTo);
            if ($parsed === false) {
                return redirect('/');
            }

            // If host is present, only allow same-host redirects
            if (isset($parsed['host']) && $parsed['host'] !== $request->getHost()) {
                return redirect('/');
            }

            $path = ($parsed['path'] ?? '/') . (isset($parsed['query']) ? '?' . $parsed['query'] : '');
            return redirect()->to($path);
        }

        // Fallback to intended (default)
        return redirect('/');
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
}
