@extends("layouts.pdf")

@section("contenido")
    <h6>AlquiLanz</h6><br>
    <img src="https://blogger.googleusercontent.com/img/a/AVvXsEg1GK3r44hZQBYQQuYoA2Chbwsz9PWICuzjc3DsRMIxm2KHMbQdoDog8yEQijxorW3OFWqWhd2eKELMtZkwSdUKbSojqkV6oDHtDeXc07nxUuN_4i78DzFst7MiINSsl66PG9aQux9I24aqDVcd_0520ar8Gkm4pSrG0Modz8p9SdyhffsQ1dtMKJP5jg=s320" class="rounded mx-auto d-block" alt="Responsive image" height="100px" weight="100px" align="middle">
    <h1>Listado de Alquileres</h1>

    @if(count($alquilers)>0)
        <table id="tabla_alquilers" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Fecha_alquiler</th>
                    <th>Precio</th>
                    <th>Id_Coche</th>
                    <th>Id_Cliente</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alquilers as $alquiler)
                        <tr data-id='{{$alquiler->id}}'>
                            <td>{{$alquiler->id}}</td>
                            <td>{{$alquiler->f_alquiler}}</td>
                            <td>{{$alquiler->precio}}</td>
                            <td>{{$alquiler->id_coche}}</td>
                            <td>{{$alquiler->id_cliente}}</td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h1>No existe registros para alquileres</h1>
    @endif
@endsection