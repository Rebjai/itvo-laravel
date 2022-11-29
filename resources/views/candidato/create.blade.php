@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Agregar Candidato
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{ route('candidato.store') }} " enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="nombrecompleto">Nombre completo:</label>
                <input type="text" id="nombrecompleto" class="form-control" name="nombrecompleto" />
            </div>
            <div class="form-group">
                <label for="edad">edad:</label>
                <input type="text" 
                    class="numberonly"
                    id="edad" 
                    name="edad" 
                    maxlength="3"
                >
            </div>
            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select name="sexo">
                    <option value="H">Hombre</option>
                    <option value="M">Mujer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" id="foto" accept="image/png, image/jpeg" class="form-control" name="foto" onchange="loadImg()" />
                <div style="margin: 10px;"></div>
                <!-- Proporcion de un 25% en base a su altura -->
                <img id="out-img" style="width: 25vw; min-width: 140px;" />
            </div>
            <div class="form-group">
                <label for="perfil">Perfil:</label>
                <input type="file" id="perfil" accept="application/pdf" class="form-control" name="perfil" onchange="loadFile()" />
                <div style="margin: 10px;"></div>
                <!-- <embed src="src" id="src" style="width: 55vw; min-width: 140px;"> -->
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        <script>
            $(document).ready(function() {

                $('.numberonly').keypress(function(e) {

                    let charCode = (e.which) ? e.which : e.keyCode

                    if (String.fromCharCode(charCode).match(/[^0-9]/g))

                        return false;

                });

            });
        </script>
    </div>
</div>

@endsection