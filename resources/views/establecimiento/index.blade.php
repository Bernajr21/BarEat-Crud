


<div class="container">

    <h1>Listado de establecimientos</h1>
    <a href="{{ url('establecimiento/create')}}" class="btn btn-success">Crear un nuevo establecimiento</a>
    <br>
    <br>



    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{Session::get('mensaje')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

    </div>
    @endif





    <table class="table table-light">


        <thead class="thead-light">
            <tr>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Dirección</th>
                <th>Número de Teléfono</th>
                <th>Correo Electrónico</th>
                <th>Tipo de Establecimiento</th>
                <th>Aforo</th>
                <th>
                </th>
                <th></th>
            </tr>
        </thead>


        <tbody>
            @foreach( $establecimiento as $establecimiento_one)
            <tr>
                <td>

                    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$establecimiento_one->ruta_foto_principal}}" width="200" alt="">

                </td>
                <td>{{ $establecimiento_one->nombre_establecimiento }}</td>
                <td>{{ $establecimiento_one->descripcion_establecimiento }}</td>
                <td>{{ $establecimiento_one->dirección_establecimiento }}</td>
                <td>{{ $establecimiento_one->num_telefono }}</td>
                <td>{{ $establecimiento_one->email }}</td>
                <td>{{ $establecimiento_one->tipo_establecimiento }}</td>
                <td>{{ $establecimiento_one->aforo }}</td>
                <td>
                    <a href="{{ url('/establecimiento/'.$establecimiento_one->id.'/edit') }}" class="btn btn-warning">Editar</a>
                </td>
                <td>
                    <form action="{{ url('/establecimiento/'.$establecimiento_one->id) }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">

                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>


    </table>


{!! $establecimiento->links() !!}

</div>
