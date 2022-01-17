@extends("layouts.app")

@section("titulo")
    <title>ListaCliente</title>
@endsection

@section("contenido")

<script>
    $(document).ready(function() {
        $('#tabla_clientes').DataTable( {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        });

        $(".borrar").click(function(){
            const tr=$(this).closest("tr"); //guardamos el tr completo
            const id=tr.data("id");
            Swal.fire({
                title: '¿seguro que quieres borrarlo?',
                showCancelButton: true,
                confirmButtonText: 'Borrar',
                cancelButtonText: `Cancelar`,
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        method: "POST",
                        url   : "{{url('/clientes')}}/"+id,
                        data  : {
                            _token: "{{csrf_token()}}",
                            _method: "delete",
                        },
                        success: function(){
                            tr.fadeOut();
                        }
                    });
                } 
            })
        });
        $(".informe").click(function(){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Descargar lista',
                        showConfirmButton: false,
                        timer: 1500
                    })
        });

    } );
    </script>
 
</head>
<body>
    <h1>Clientes</h1>
    <a href="/clientes_pdf" class="btn btn-outline-success informe">Generar pdf</a><br><br>

    @if(count($clientes)>0)
        <table id="tabla_clientes" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Dni</th>
                    <th>Fecha de nacimiento</th>
                    <th>Edad</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Editar</th>
                    <th>Borrar</th>
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
                        <td>{{$cliente->edad}}</td>
                        <td>{{$cliente->telefono}}</td>
                        <td>{{$cliente->email}}</td>
                        <td align="center">
                            <a href="{{url('/clientes')}}/{{$cliente->id}}/edit"><img width="32px" src="https://img.icons8.com/cotton/2x/000000/edit.png"></a>
                        </td>
                        <td align="center">
                            <a href="#" class='btn btn-danger borrar'>Borrar</a>
                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>
    @else
        <h1>No hay usuarios</h1>
    @endif


@endsection