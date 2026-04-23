@extends('layouts.admin')

@section('title', 'Informática')
@section('module_name', 'Módulo de Informática - Inventario de Equipos')

@section('content')
    <div class="mb-6 flex justify-end">
        <a href="{{ route('equipos.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow transition flex items-center">
            <span class="mr-2">+</span> Registrar Nuevo Equipo
        </a>
    </div>

    <div class="bg-white shadow-md rounded-xl overflow-hidden">
        <table class="min-w-full">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200">
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Nombre del Equipo</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Marca</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Descripción</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($equipos as $equipo)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-sm text-gray-900 font-medium">
                        {{ $equipo->nombre }}
                    </td>
                    <td class="px-6 py-4 text-sm">
                        <span class="px-3 py-1 text-xs font-semibold text-gray-700 bg-gray-200 rounded-full">
                            {{ $equipo->marca }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        {{ $equipo->descripcion ?? 'Sin detalles adicionales' }}
                    </td>
                    <td class="px-6 py-4 text-sm text-center">
                        <div class="flex justify-center items-center space-x-4">
                            <a href="{{ route('equipos.edit', $equipo) }}" class="text-blue-600 hover:text-blue-900 font-medium">Editar</a>

                            <form action="{{ route('equipos.destroy', $equipo) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este equipo del inventario?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 font-medium">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                        No hay equipos registrados en el inventario.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
