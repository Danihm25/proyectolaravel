<h1>Módulo de Recursos Humanos - Nómina</h1>
<a href="{{ route('rrhh.create') }}">Registrar Nuevo Empleado</a>

<table border="1" style="width: 100%; text-align: left; margin-top: 20px;">
    <thead>
        <tr>
            <th>Nombre Completo</th>
            <th>DNI</th>
            <th>Puesto</th>
            <th>Salario</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($empleados as $e)
        <tr>
            <td>{{ $e->nombre }} {{ $e->apellido }}</td>
            <td>{{ $e->dni }}</td>
            <td>{{ $e->puesto }}</td>
            <td>${{ number_format($e->salario, 2) }}</td>
            <td>
                <form action="{{ route('rrhh.destroy', $e) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit">Dar de Baja</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
