<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-100 px-4">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl p-8 md:p-10">
        <!-- Logo/Header -->
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-2xl mb-6">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-900">Portfolio Zugang</h1>
            <p class="text-gray-600 mt-3">Bitte geben Sie Ihren persönlichen Zugangscode ein.</p>
        </div>

        <!-- Fehler-Box (wenn vorhanden) -->
        @if ($errors->has('code'))
            <div class="mb-8 p-5 bg-red-50 border-l-4 border-red-500 rounded-lg">
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-red-500 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <h3 class="text-lg font-semibold text-red-800">Zugang verweigert</h3>
                        <p class="text-red-700 mt-1">{{ $errors->first('code') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Erfolgsmeldung (optional) -->
        @if (session('success'))
            <div class="mb-8 p-5 bg-green-50 border-l-4 border-green-500 rounded-lg">
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <h3 class="text-lg font-semibold text-green-800">Erfolgreich</h3>
                        <p class="text-green-700 mt-1">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Formular -->
        <form wire:submit.prevent="validateCode" class="space-y-8">
            <div>
                <label for="code" class="block text-sm font-semibold text-gray-800 mb-3">Zugangscode</label>
                <div class="relative">
                    <input
                        type="text"
                        id="code"
                        wire:model="code"
                        class="w-full px-5 py-4 text-lg rounded-xl border-2 border-gray-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition duration-200 placeholder-gray-400"
                        placeholder="z.B. FIRMA-2024"
                        autofocus
                        autocomplete="off"
                    >
                    <div class="absolute right-4 top-1/2 transform -translate-y-1/2">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                        </svg>
                    </div>
                </div>
                <!-- Inline-Fehler (zusätzlich) -->
                @error('code')
                    <span class="text-red-600 text-sm mt-2 block">{{ $message }}</span>
                @enderror
                <p class="text-gray-500 text-sm mt-3">Der Code wurde Ihnen per E-Mail zugesandt.</p>
            </div>

            <button
                type="submit"
                wire:loading.attr="disabled"
                class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 flex items-center justify-center disabled:opacity-70"
            >
                <span wire:loading.remove wire:target="validateCode">Zugang prüfen</span>
                <span wire:loading wire:target="validateCode" class="flex items-center">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Wird geprüft...
                </span>
            </button>
        </form>

        <!-- Footer-Hinweis -->
        <div class="mt-12 pt-8 border-t border-gray-200 text-center">
            <p class="text-gray-500 text-sm">Sie haben keinen Code? <a href="mailto:support@example.com" class="text-blue-600 hover:text-blue-800 font-medium">Kontaktieren Sie uns</a></p>
        </div>
    </div>
</div>
