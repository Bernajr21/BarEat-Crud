
<form action="{{ url('/establecimiento') }}" method="post" enctype="multipart/form-data">

@csrf

@include('establecimiento.form',['modo'=>'Crear']);

</form>