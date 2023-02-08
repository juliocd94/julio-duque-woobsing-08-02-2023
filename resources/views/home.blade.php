@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (request()->ip() == '127.0.0.1' && auth()->user()->role_id == 1)
                    <h1 class="text-center m-2">Hola
                        <strong>{{ auth()->user()->name . ' ' . auth()->user()->last_name }}</strong>, se creó
                        con exito la cookie origin_sesion</h1>
                @else
                    <h1>Hola {{ auth()->user()->name . ' ' . auth()->user()->last_name }}</h1>
                @endif

                <h2 class="text-center mt-3">Consultas a base de datos</h2>

                <h3 class="mt-3">Los usuarios que tengan el rol 1 y 2 (client, admin):</h3>

                <ul>
                    @foreach ($users_rol_1_and_2 as $user)
                        <li><strong>Nombre: </strong> {{ $user->name . " " . $user->last_name }}, {{ $user->email }}, <strong>Rol: </strong> {{ $user->role->name }}</li>
                    @endforeach
                </ul>

                <h3 class="mt-2">Los permisos que se tienen del rol 1 (client): </h3>

                <ul>
                    @foreach ($role_1->permission as $permission)
                        <li>{{ $permission->permission }}</li>
                    @endforeach
                </ul>

                <h3 class="mt-2">Los usuarios y el rol que tienen el permiso 2 ({{ $permissions->permission }}):</h3>

                <ul>
                    @foreach ($users as $user)
                        <li><strong>Nombre: </strong>{{ $user->name . " " . $user->last_name }} <strong> Rol: </strong>{{ $user->role->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
