<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Willkommen bei unserer Firma')</title>

    <!-- Tailwind CSS (über Vite) -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">

<!-- Header -->
<header class="bg-blue-600 text-white p-4">
    <div class="container mx-auto">
        <h1 class="text-xl font-bold">Unsere Firma</h1>
        <nav>
            <ul class="flex space-x-4">
                <li><a href="/" class="hover:text-gray-200">Home</a></li>
                <li><a href="/about" class="hover:text-gray-200">About</a></li>
                <li><a href="/contact" class="hover:text-gray-200">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Main Content -->
<main>
    @yield('content') <!-- Hier kommt der spezifische Inhalt jeder Seite rein -->
</main>

<!-- Footer -->
<footer class="bg-gray-800 text-white p-4 mt-8 text-center">
    &copy; 2026 Unsere Firma. Alle Rechte vorbehalten.
</footer>

</body>

</html>
