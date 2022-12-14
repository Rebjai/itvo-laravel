@extends('plantilla')
@section('content')
<style>
 .uper {
 margin-top: 40px;
 }
</style>
<div class="uper">
 @if(session()->get('success'))
 <div class="alert alert-success">
 {{ session()->get('success') }}
 </div><br />
 @endif
 <table class="table table-striped">
 <thead>
 <tr>
 <td>ID</td>
 <td>DESCRIPCIÓN</td>
 <td colspan="2">Action</td>
 </tr>
 </thead>
 <tbody>
 @foreach($roles as $rol)
 <tr>
 <td>{{$rol->id}}</td>
 <td>{{$rol->descripcion}}</td>
 <td><a href="{{ route('rol.edit', $rol->id)}}"
 class="btn btn-primary">Edit</a></td>
 <td>
 <form action="{{ route('rol.destroy', $rol->id)}}"
 method="post">
 @csrf
 @method('DELETE')
 <button class="btn btn-danger" type="submit"
 onclick="return confirm('Esta seguro de borrar {{$rol->descripcion}}')" >Del</button>
 </form>
 </td>
 </tr>
 @endforeach
 </tbody>
 </table>
<div>
@endsection