<div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <div class="registration-form">
                        <form action="{{ url('/establecimiento') }}" method="post" enctype="multipart/form-data">

                            @csrf

                            @include('establecimiento.form',['modo'=>'Crear']);

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>