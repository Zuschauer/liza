<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Redirect;

class ValidateAccessCode extends Component
{
    public $code = '';

    protected function rules(): array
    {
        return [
            'code' => ['required', 'string', 'min:3'],
        ];
    }

    public function validateCode()
    {
        $this->validate();

        // Suche die Firma mit dem Code
        $company = \App\Models\Company::where('access_code', $this->code)
            ->where('is_active', true)
            ->first();

        if ($company) {
            // Speichere den Zugriff in der Session
            session(['portfolio_access' => $company->slug]);

            // Weiterleitung zur Firmenseite
            return redirect()->route('company.show', ['slug' => $company->slug]);
        } else {
            $this->addError('code', 'Dieser Code ist leider ungültig.');
        }
    }

    public function render()
    {
        return view('livewire.validate-access-code');
    }
}
