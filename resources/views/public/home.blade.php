<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Portfolio – Zugang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Später ersetzen wir das durch ein richtiges Layout --}}
    <style>
        body {
            font-family: system-ui, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 10px 25px rgba(0,0,0,.08);
        }
        input, button {
            width: 100%;
            padding: .75rem;
            margin-top: .75rem;
        }
        button {
            background: #111;
            color: white;
            border: none;
            cursor: pointer;
        }
        .error {
            color: #c00;
            margin-top: .5rem;
        }
    </style>
</head>
<body>

<div class="card">
    <h1>Willkommen</h1>
    <p>Bitte geben Sie Ihren Zugangscode ein.</p>

    <form action="{{ route('access.verify') }}" method="POST">
        @csrf
        <div>
            <label for="code">Zugangscode</label>
            <input type="text" name="code" id="code" required>
        </div>
        <button type="submit">Zugangscode eingeben</button>
    </form>

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
</div>

</body>
</html>
