@extends('plantilla')
@section('content')
<style>
 .uper {
 margin-top: 40px;
 }
</style>
<div class="card uper">
 <div class="card-header">
 Editar rol
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
 <form method="POST"
 action="{{ route('rol.update', $rol->id) }}"
 enctype="multipart/form-data">
 {{ csrf_field() }}
 @method('PUT')
 <div class="form-group">
 <label for="id">ID:</label>
 <input type="text"
 class="form-control"
 readonly="true"
 value="{{$rol->id}}"
 name="id"/>
 </div>
 <div class="form-group">
 <label for="descripcion">Descripción:</label>
 <input type="text"
 value="{{$rol->descripcion}}"
 class="form-control"
 name="descripcion"/>
 </div>

 <button type="submit" class="btn btn-primary">Guardar</button>
 </form>
 </div>
</div>
@endsection