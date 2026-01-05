<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Öffentliche Startseite
     */
    public function index()
    {
        return view('public.home');
    }

    /**
     * Code prüfen & weiterleiten
     */
    public function access(Request $request)
    {
        $request->validate([
            'code' => ['required', 'string'],
        ]);

        $company = Company::where('access_code', $request->code)
            ->where('is_active', true)
            ->first();

        if (! $company) {
            return back()->withErrors([
                'code' => 'Ungültiger oder inaktiver Zugangscode',
            ]);
        }

        return redirect()->route('company.page', $company->slug);
    }

    /**
     * Öffentliche Firmenseite
     */
    public function show(string $slug)
    {
        $company = Company::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('public.company', compact('company'));
    }
}
