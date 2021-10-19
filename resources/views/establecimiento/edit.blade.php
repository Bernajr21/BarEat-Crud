
<form action="{{ url('/establecimiento/'.$establecimiento->id) }}" method="post"  enctype="multipart/form-data">
@csrf

{{method_field('PATCH')}}

@include('establecimiento.form',['modo'=>'Editar'])

</form>