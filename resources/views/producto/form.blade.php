
<div class="container">

    <h1>{{$modo}} producto</h1>

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
        <label for="nombre_producto">Nombre del Producto</label>
        <input class="form-control" type="text" name="nombre_producto" value="{{isset($producto->nombre_producto)? $producto->nombre_producto:old('nombre_producto') }}">
    </div>


    <div class="form-group">
        <label for="descripcion_producto">Descripción</label>
        <input class="form-control" type="text" name="descripcion_producto" value="{{isset($producto->descripcion_producto)? $producto->descripcion_producto:old('descripcion_producto') }}">
    </div>

    <div class="form-group">
        <label for="precio_producto">Precio</label>
        <input class="form-control" type="text" name="precio_producto" value="{{isset($producto->precio_producto)? $producto->precio_producto:old('precio_producto') }}">
    </div>

    <div class="form-group">
        <select name="tipo_producto" class="form-select" aria-label="Tipo de producto">
            <option selected>Selecciona el tipo de Producto</option>
            <option value="Tapa">Tapa</option>
            <option value="Ración">Ración</option>
            <option value="Plato">Plato</option>
            <option value="Bebida">Bebida</option>
            <option value="Postre">Postre</option>
        </select>
    </div>

    {{-- <input type="hidden" id="carta_id" name="carta_id" value="1"> Si lo quisieramos ocultar--}}

    <div class="form-group">
        <x-adminlte-select name="carta_id" label="Selecciona carta" label-class="text-dark" igroup-size="md">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-success">
                    <i class="fas fa-card"></i>
                </div>
            </x-slot>
            @foreach ($carta as $carta_one)               
            
            <option value="{{$carta_one-> id}}">{{$carta_one -> establecimiento_id}}</option>
            @endforeach
        </x-adminlte-select>
    </div>


    <div class="form-group">
        <label for="ruta_foto_principal">Fotografía</label>
        @if(isset($producto->ruta_foto_principal))
        <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$producto->ruta_foto_principal}}" width="100" alt="">
        @endif
        <x-adminlte-input-file name="ruta_foto_principal" igroup-size="md" placeholder="Elige una foto...">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-lightblue">
                    <i class="fas fa-upload"></i>
                </div>
            </x-slot>
        </x-adminlte-input-file>

    <input class="btn btn-success" type="submit" value="{{$modo}} datos">

    <a href="{{ url('producto')}}" class="btn btn-primary">Inicio</a>

</div>
