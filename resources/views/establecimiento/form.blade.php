<div class="container">

    <h1>{{$modo}} establecimiento</h1>

    @if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul> @foreach($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
            @endforeach
        </ul>



    </div>
    @endif



    <div class="form-group">
        <label for="nombre_establecimiento">Nombre del Establecimiento</label>
        <input class="form-control" type="text" name="nombre_establecimiento" value="{{isset($establecimiento->nombre_establecimiento)? $establecimiento->nombre_establecimiento:old('nombre_establecimiento') }}">
    </div>



    <div class="form-group">
        <label for="descripcion_establecimiento">Descripción</label>
        <input class="form-control" type="text" name="descripcion_establecimiento" value="{{isset($establecimiento->descripcion_establecimiento)? $establecimiento->descripcion_establecimiento:old('descripcion_establecimiento') }}">
    </div>

    

    <div class="form-group">
        <label for="dirección_establecimiento">Dirección</label>
        <input class="form-control" type="text" name="dirección_establecimiento" value="{{isset($establecimiento->dirección_establecimiento)? $establecimiento->dirección_establecimiento:old('dirección_establecimiento') }}">
    </div>

    <div class="form-group">
        <label for="num_telefono">Teléfono</label>
        <input class="form-control" type="number" name="num_telefono" value="{{isset($establecimiento->num_telefono)? $establecimiento->num_telefono:old('num_telefono') }}">
    </div>


    <div class="form-group">
        <label for="email">Correo Electrónico</label>
        <input class="form-control" type="email" name="email" value="{{isset($establecimiento->email)? $establecimiento->email:old('email') }}">
    </div>

    <div class="form-group">
        <x-adminlte-select name="tipo_establecimiento" label="Selecciona tipo de establecimiento" label-class="text-dark" igroup-size="md">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-success">
                    <i class="fas fa-home"></i>
                </div>
            </x-slot>
            <option value="Bar">Bar</option>
            <option value="Cafetería">Cafetería</option>
            <option value="Restaurante">Restaurante</option>
        </x-adminlte-select>
    </div>

    <div class="form-group">
        <label for="nif">NIF</label>
        <input class="form-control" type="text" name="nif" value="{{isset($establecimiento->nif)? $establecimiento->nif:'' }}">

    </div>

    <div class="form-group">
        <label for="maximo_numero_comensales">Número máximo de comensales</label>
        <input class="form-control" type="number" name="maximo_numero_comensales" value="{{isset($establecimiento->maximo_numero_comensales)? $establecimiento->maximo_numero_comensales:old('maximo_numero_comensales') }}">

    </div>

    <div class="form-group">
        <label for="aforo">Aforo</label>
        <input class="form-control" type="number" name="aforo" value="{{isset($establecimiento->aforo)? $establecimiento->aforo:old('aforo') }}">

    </div>


    <div class="form-group">
        <x-adminlte-select name="user_id" label="Selecciona usuario" label-class="text-dark" igroup-size="md">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-success">
                    <i class="fas fa-users"></i>
                </div>
            </x-slot>
            @foreach ($usuario as $user)
            <option value="{{$user -> id}}">{{$user -> name}}</option>
            @endforeach
        </x-adminlte-select>
    </div>


    <div class="form-group">
        <label for="ruta_foto_principal">Fotografía</label>
        @if(isset($establecimiento->ruta_foto_principal))
        <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$establecimiento->ruta_foto_principal}}" width="100" alt="">
        @endif
        <x-adminlte-input-file name="ruta_foto_principal" igroup-size="md" placeholder="Elige una foto...">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-lightblue">
                    <i class="fas fa-upload"></i>
                </div>
            </x-slot>
        </x-adminlte-input-file>

    </div>



    <input class="btn btn-success" type="submit" value="{{$modo}} datos">

    <a href="{{ url('establecimiento')}}" class="btn btn-primary">Inicio</a>

</div>