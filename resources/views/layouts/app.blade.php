<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca de Juan Ospina</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-primary font-sans min-h-screen flex">
    {{-- Sidebar (oculta en móvil) --}}
    <aside x-data="{ open: false }" class="bg-card w-64 hidden md:block flex-shrink-0" x-cloak>
        <nav class="h-full py-6 flex flex-col">
            <div class="px-4 mb-6">
                <h2 class="text-2xl font-semibold text-primary">Biblioteca</h2>
                <p class="text-secondary text-sm">Juan Ospina</p>
            </div>
            <ul class="flex-1 space-y-2">
                <li>
                    <a href="{{ route('libros.index') }}"
                       class="block px-4 py-2 rounded-xl hover:bg-accent hover:text-background {{ request()->routeIs('libros.*') ? 'bg-gradient-to-r from-accent to-accent2 text-background' : '' }}">
                        Libros
                    </a>
                </li>
                <li>
                    <a href="{{ route('categorias.index') }}"
                       class="block px-4 py-2 rounded-xl hover:bg-accent hover:text-background {{ request()->routeIs('categorias.*') ? 'bg-gradient-to-r from-accent to-accent2 text-background' : '' }}">
                        Categorías
                    </a>
                </li>
            </ul>
            <footer class="px-4 text-xs text-secondary">
                Juan Ospina · Ficha 3478025 · 2026
            </footer>
        </nav>
    </aside>

    {{-- Contenedor principal --}}
    <div class="flex-1 flex flex-col">
        {{-- Header con botón hamburguesa en móvil --}}
        <header class="bg-card text-primary py-4 px-4 flex items-center justify-between md:justify-start">
            <button @click="open = !open" class="md:hidden btn-outline mr-4" x-show="!open">
                ☰
            </button>
            <h1 class="text-2xl font-semibold">Biblioteca de <span class="text-accent">Juan</span></h1>
        </header>

        {{-- Menú móvil overlay --}}
        <div x-show="open" @click.away="open = false" class="fixed inset-0 z-20 bg-black bg-opacity-50 md:hidden" x-cloak>
            <aside class="bg-card w-64 h-full p-4">
                <button @click="open = false" class="btn-outline mb-4">✕ Cerrar</button>
                <ul class="space-y-2">
                    <li><a href="{{ route('libros.index') }}" class="block px-3 py-2 rounded hover:bg-accent">Libros</a></li>
                    <li><a href="{{ route('categorias.index') }}" class="block px-3 py-2 rounded hover:bg-accent">Categorías</a></li>
                </ul>
            </aside>
        </div>

        {{-- Flash messages y contenido --}}
        <main class="flex-1 container mx-auto px-4 py-6 space-y-6">
            @if (session('success'))
                <div class="bg-positive bg-opacity-20 text-positive border border-positive rounded p-3">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-600 bg-opacity-20 text-red-600 border border-red-600 rounded p-3">
                    {{ session('error') }}
                </div>
            @endif
            @yield('content')
        </main>

        <footer class="bg-card text-secondary py-3 hidden md:block">
            <div class="container mx-auto text-center text-sm">
                Juan Ospina · Ficha 3478025 · 2026
            </div>
        </footer>
    </div>

    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>
