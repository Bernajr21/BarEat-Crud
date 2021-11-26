
<div class="container">

    <h1>{{$modo}} carta</h1>

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
        <x-adminlte-select name="establecimiento_id" label="Selecciona establecimiento" label-class="text-dark" igroup-size="md">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-success">
                    <i class="fas fa-home"></i>
                </div>
            </x-slot>
            @foreach ($establecimiento as $establecimiento_one)
            <option value="{{$establecimiento_one -> id}}">{{$establecimiento_one -> nombre_establecimiento}}</option>
            @endforeach
        </x-adminlte-select>
    </div>


    <input class="btn btn-success" type="submit" value="{{$modo}} datos">

    <a href="{{ url('producto')}}" class="btn btn-primary">Inicio</a>

</div>
