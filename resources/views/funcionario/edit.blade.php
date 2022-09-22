@extends('plantilla')
@section('content')
<style>
 .uper {
 margin-top: 40px;
 }
</style>
<div class="card uper">
 <div class="card-header">
 Editar funcionario
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
 action="{{ route('funcionario.update', $funcionario->id) }}"
 enctype="multipart/form-data">
 {{ csrf_field() }}
 @method('PUT')
 <div class="form-group">
 <label for="id">ID:</label>
 <input type="text"
 class="form-control"
 readonly="true"
 value="{{$funcionario->id}}"
 name="id"/>
 </div>
 <div class="form-group">
 <label for="descripcion">Nombre Completo:</label>
 <input type="text"
 value="{{$funcionario->nombrecompleto}}"
 class="form-control"
 name="nombrecompleto"/>
 </div>
 <div class="form-group">
 <label for="descripcion">Sexo:</label>
 <select name="sexo" id="">
    <option value="M" {{$funcionario->sexo == "M"? 'selected' : ''}}>Masculino</option>
    <option value="F" {{$funcionario->sexo == "F"? 'selected' : ''}}>Femenino</option> 
 </select>
 </div>

 <button type="submit" class="btn btn-primary">Guardar</button>
 </form>
 </div>
</div>
@endsection