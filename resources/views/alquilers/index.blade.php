@extends("layouts.app")

@section("titulo")
    <title>ListaAlquileres</title>
@endsection

@section("contenido")

<script>
    $(document).ready(function() {
        $('#tabla_alquilers').DataTable( {
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
                        url   : "{{url('/alquilers')}}/"+id,
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
    <h1>Alquileres</h1>
    <a href="/alquilers_pdf" class="btn btn-outline-success informe">Generar pdf</a><br><br>

    @if(count($alquilers)>0)
        <table id="tabla_alquilers" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Fecha de alquiler</th>
                    <th>Precio</th>
                    <th>Id de coche</th>
                    <th>Id de cliente</th>
                    <th>Editar</th>
                    <th>Borrar</th>
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
                        <td align="center">
                            <a href="{{url('/alquilers')}}/{{$alquiler->id}}/edit"><img width="32px" src="https://img.icons8.com/cotton/2x/000000/edit.png"></a>
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