<div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <div class="registration-form">
                        <form action="{{ url('/establecimiento/'.$establecimiento->id) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            {{method_field('PATCH')}}

                            @include('establecimiento.form',['modo'=>'Editar'])

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>