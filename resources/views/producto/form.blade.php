
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
        <textarea row="3" class="form-control" type="text" name="descripcion_producto" value="{{isset($producto->descripcion_producto)? $producto->descripcion_producto:old('descripcion_producto') }}"></textarea>
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

    <div class="form-group">
        <label for="carta_id">ID de la Carta</label>
        <input class="form-control" type="carta_id" name="carta_id" value="{{isset($producto->carta_id)? $producto->carta_id:old('carta_id') }}">
    </div>


    <div class="form-group">
        <label for="ruta_foto_principal">Fotografía</label>
        @if(isset($producto->ruta_foto_principal))
        <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$producto->ruta_foto_principal}}" width="100" alt="">
        @endif
        <input class="form-control" type="file" name="ruta_foto_principal">

    </div>

    <input class="btn btn-success" type="submit" value="{{$modo}} datos">

    <a href="{{ url('producto')}}" class="btn btn-primary">Inicio</a>

</div>
