@extends("layouts.pdf")

@section("contenido")
    <h6>AlquiLanz</h6><br>
    <img src="https://blogger.googleusercontent.com/img/a/AVvXsEg1GK3r44hZQBYQQuYoA2Chbwsz9PWICuzjc3DsRMIxm2KHMbQdoDog8yEQijxorW3OFWqWhd2eKELMtZkwSdUKbSojqkV6oDHtDeXc07nxUuN_4i78DzFst7MiINSsl66PG9aQux9I24aqDVcd_0520ar8Gkm4pSrG0Modz8p9SdyhffsQ1dtMKJP5jg=s320" class="rounded mx-auto d-block" alt="Responsive image" height="100px" weight="100px" align="middle">
    <h1>Listado de coches</h1>

    @if(count($coches)>0)
        <table id="tabla_coches" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Descripcion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($coches as $coche)
                        <tr data-id='{{$coche->id}}'>
                            <td>{{$coche->id}}</td>
                            <td>{{$coche->modelo}}</td>
                            <td>{{$coche->marca}}</td>
                            <td>{{$coche->descripcion}}</td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h1>No existe registros para coches</h1>
    @endif
@endsection