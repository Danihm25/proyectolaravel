<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración | Recursos Humanos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex h-screen">
        <div class="w-64 bg-slate-800 text-white flex flex-col">
            <div class="p-6 text-2xl font-bold border-b border-slate-700">Ecolife Admin</div>
            <nav class="flex-1 p-4">
                <a href="{{ route('rrhh.index') }}" class="block py-2.5 px-4 rounded bg-slate-700">👥 Recursos Humanos</a>
                <a href="{{ route('contadores.index') }}" class="block py-2.5 px-4 rounded hover:bg-slate-700">💰 Contabilidad</a>
                <a href="{{ route('equipos.index') }}" class="block py-2.5 px-4 rounded hover:bg-slate-700">💻 Informática</a>
            </nav>
        </div>

        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow py-4 px-6 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800">Módulo de Recursos Humanos - Nómina</h2>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600 font-medium">Panel Administrativo</span>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto p-6">

                <div class="mb-6 flex justify-end">
                    <a href="{{ route('rrhh.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-lg shadow transition">
                        + Registrar Nuevo Empleado
                    </a>
                </div>

                <div class="bg-white shadow-md rounded-xl overflow-hidden">
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Nombre Completo</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">DNI</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Puesto</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Salario</th>
                                <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($empleados as $e)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm text-gray-900 font-medium">
                                    {{ $e->nombre }} {{ $e->apellido }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $e->dni }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="px-3 py-1 text-xs font-semibold text-blue-700 bg-blue-100 rounded-full">
                                        {{ $e->puesto }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 font-bold">
                                    ${{ number_format($e->salario, 2) }}
                                </td>
                                <td class="px-6 py-4 text-sm text-center">
                                    <div class="flex justify-center items-center space-x-4">
                                        <a href="{{ route('rrhh.edit', $e) }}" class="text-indigo-600 hover:text-indigo-900 font-medium">Editar</a>

                                        <form action="{{ route('rrhh.destroy', $e) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas dar de baja a este empleado?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 font-medium">
                                                Dar de Baja
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
