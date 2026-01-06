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
    /**
     * Code prüfen & weiterleiten
     */
    public function access(Request $request)
    {
        // Validierung des eingegebenen Codes
        $request->validate([
            'code' => ['required', 'string'],
        ]);

        $company = Company::where('access_code', $request->code)
            ->where('is_active', true)
            ->first();

        if (!$company) {
            return back()->withErrors([
                'code' => 'Ungültiger oder inaktiver Zugangscode',
            ]);
        }

        return redirect()->route('company.show', ['slug' => $company->slug]);
    }

    /**
     * Öffentliche Firmenseite
     */
    public function show(string $slug)
    {
        // Suche nach der Firma mit dem Slug und prüfe, ob sie aktiv ist
        $company = Company::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // Gib die Firmendaten an die View weiter
        return view('public.company', compact('company'));
    }
}
