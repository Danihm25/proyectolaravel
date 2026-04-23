@extends('layouts.admin')

@section('title', 'Contabilidad')
@section('module_name', 'Módulo de Contabilidad - Facturas')

@section('content')
    <div class="mb-6 flex justify-end">
        <a href="{{ route('contadores.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg shadow transition">
            + Nueva Factura
        </a>
    </div>

    <div class="bg-white shadow-md rounded-xl overflow-hidden">
        <table class="min-w-full">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200">
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Cliente</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Monto</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Estado</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($facturas as $f)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-sm text-gray-900 font-medium">{{ $f->cliente }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900 font-bold">${{ number_format($f->monto, 2) }}</td>
                    <td class="px-6 py-4 text-sm">
                        <span class="px-3 py-1 text-xs font-semibold rounded-full
                            {{ $f->estado == 'pagado' ? 'bg-green-100 text-green-700' : 'bg-amber-100 text-amber-700' }}">
                            {{ ucfirst($f->estado) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-center">
                        <form action="{{ route('contadores.destroy', $f) }}" method="POST" onsubmit="return confirm('¿Eliminar factura?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 font-medium">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
