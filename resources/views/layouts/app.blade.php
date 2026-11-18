<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca de Juan</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
    <!-- Header -->
    <header class="bg-indigo-800 text-white py-4">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-semibold">Biblioteca de Juan</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-6">
        <!-- Flash messages -->
        @if (session('success'))
            <div class="mb-4 rounded bg-green-100 border border-green-200 p-3 text-green-800">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="mb-4 rounded bg-red-100 border border-red-200 p-3 text-red-800">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-3 mt-8">
        <div class="container mx-auto px-4 text-center text-sm">
            Juan Ospina &middot; Ficha 3478025 &middot; 2026
        </div>
    </footer>
</body>
</html>
