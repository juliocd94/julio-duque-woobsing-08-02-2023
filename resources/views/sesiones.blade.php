@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="text-center m-5">Hola <strong>{{ auth()->user()->name }} {{ auth()->user()->last_name }}</strong>
                    Tu última sesión
                    fue hace más de un día, especificamente el {{ auth()->user()->last_login }}</h1>
            </div>
        </div>
    </div>
@endsection
