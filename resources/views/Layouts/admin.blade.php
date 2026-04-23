<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecolife Admin - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        <div class="w-64 bg-slate-800 text-white flex flex-col">
            <div class="p-6 text-2xl font-bold border-b border-slate-700">Ecolife Admin</div>
            <nav class="flex-1 p-4">
                <a href="{{ route('rrhh.index') }}" class="block py-2.5 px-4 rounded mb-2 hover:bg-slate-700 {{ request()->routeIs('rrhh.*') ? 'bg-slate-700' : '' }}">
                    👥 Recursos Humanos
                </a>
                <a href="{{ route('contadores.index') }}" class="block py-2.5 px-4 rounded mb-2 hover:bg-slate-700 {{ request()->routeIs('contadores.*') ? 'bg-slate-700' : '' }}">
                    💰 Contabilidad
                </a>
                <a href="{{ route('equipos.index') }}" class="block py-2.5 px-4 rounded mb-2 hover:bg-slate-700 {{ request()->routeIs('equipos.*') ? 'bg-slate-700' : '' }}">
                    💻 Informática
                </a>
            </nav>
        </div>

        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow py-4 px-6 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800">@yield('module_name')</h2>
            </header>
            <main class="flex-1 overflow-x-hidden overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
