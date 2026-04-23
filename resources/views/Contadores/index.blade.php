<h1>Módulo de Contadores - Facturación</h1>
<a href="{{ route('contadores.create') }}">Nueva Factura</a>

<table>
    <thead>
        <tr>
            <th>Cliente</th>
            <th>Monto</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($facturas as $f)
        <tr>
            <td>{{ $f->cliente }}</td>
            <td>${{ $f->monto }}</td>
            <td>{{ $f->estado }}</td>
            <td>
                <form action="{{ route('contadores.destroy', $f) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
