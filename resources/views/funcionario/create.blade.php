@extends('plantilla')
@section('content')
<style>
 .uper {
 margin-top: 40px;
 }
</style>
<div class="card uper">
 <div class="card-header">
 Agregar Funcionarios
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
 <form method="post" action="{{ route('funcionario.store') }} " enctype="multipart/form-data">
 {{ csrf_field() }}
 <div class="form-group">
 @csrf
 <label for="nombrecompleto">Nombre completo:</label>
 <input type="text" class="form-control" name="nombrecompleto"/>
 </div>
 

 <div class="form-group">
 <label for="descripcion">Sexo:</label>
 <select name="sexo" id="">
    <option value="M">Masculino</option>
    <option value="F">Femenino</option> 
 </select>
 </div>

 <button type="submit" class="btn btn-primary">Guardar</button>
 </form>
 </div>
</div>
@endsection