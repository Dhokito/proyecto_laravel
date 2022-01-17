@extends("layouts.app")

@section("titulo")
    <title>ListaCoches</title>
@endsection

@section("contenido")

<script>
    $(document).ready(function() {
        $('#tabla_coches').DataTable( {
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
                        url   : "{{url('/coches')}}/"+id,
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


    <h1>Coches</h1>
    <a href="/coches_pdf" class="btn btn-outline-success informe">Generar pdf</a><br><br>

    @if(count($coches)>0)
        <table id="tabla_coches" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Descripcion</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($coches as $coche)
                    <tr data-id='{{$coche->id}}'>
                        <td>{{$coche->id}}</td>
                        <td>{{$coche->modelo}}</td>
                        <td>{{$coche->marca}}</td>
                        <td>{{$coche->descripcion}}</td>
                        <td align="center">
                            <a href="{{url('/coches')}}/{{$coche->id}}/edit"><img width="32px" src="https://img.icons8.com/cotton/2x/000000/edit.png"></a>
                        </td>
                        <td align="center">
                            <a href="#" class='btn btn-danger borrar'>Borrar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h1>No hay publicaciones</h1>
    @endif
@endsection