@extends('plantilla')
@section('content')

<div>
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Nombre completo</td>
                <td>foto</td>
                <td>perfil</td>
                <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($candidatos as $candidato)
            <tr>
                <td>{{$candidato->id}}</td>
                <td>{{$candidato->nombrecompleto}}</td>

                <td><img src="images/{{$candidato->foto}}" 
                width="128px" height="128px">
                </td>
                
                <td>
                    <a href="/storage/{{$candidato->perfil}}">
                        <img src="/images/pdf.png" width="128px">
                    </a>
                </td>

                <td><a href="{{ route('candidato.edit', $candidato->id)}}" 
                class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{ route('candidato.destroy', $candidato->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" 
                        onclick="return confirm('Esta seguro de borrar {{$candidato->nombrecompleto}}')">Del</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>