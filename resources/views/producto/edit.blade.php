<form action="{{ url('/producto/'.$producto->id) }}" method="post" enctype="multipart/form-data">
    @csrf

    {{method_field('PATCH')}}

    @include('producto.form',['modo'=>'Editar'])

</form>