@extends("layouts.pdf")

@section("contenido")
    <h6>AlquiLanz</h6><br>
    <img src="https://blogger.googleusercontent.com/img/a/AVvXsEg1GK3r44hZQBYQQuYoA2Chbwsz9PWICuzjc3DsRMIxm2KHMbQdoDog8yEQijxorW3OFWqWhd2eKELMtZkwSdUKbSojqkV6oDHtDeXc07nxUuN_4i78DzFst7MiINSsl66PG9aQux9I24aqDVcd_0520ar8Gkm4pSrG0Modz8p9SdyhffsQ1dtMKJP5jg=s320" class="rounded mx-auto d-block" alt="Responsive image" height="100px" weight="100px" align="middle">
    <h1>Listado de clientes</h1>

    @if(count($clientes)>0)
        <table id="tabla_clientes" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Dni</th>
                    <th>Fecha_nacimiento</th>
                    <th>Email</th>
                    <th>Telefono</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                        <tr data-id='{{$cliente->id}}'>
                            <td>{{$cliente->id}}</td>
                            <td>{{$cliente->nombre}}</td>
                            <td>{{$cliente->apellidos}}</td>
                            <td>{{$cliente->dni}}</td>
                            <td>{{$cliente->f_nacimiento}}</td>
                            <td>{{$cliente->email}}</td>
                            <td>{{$cliente->telefono}}</td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h1>No existe registros para clientes</h1>
    @endif
@endsection