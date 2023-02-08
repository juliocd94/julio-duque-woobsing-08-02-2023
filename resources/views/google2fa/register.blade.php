@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card card-default">
                    <h4 class="card-heading text-center mt-4">Configurar Google Authenticator</h4>

                    <div class="card-body" style="text-align: center;">
                        <p>Configure su autenticación de dos factores usando el código: <strong>
                                <h1>{{ implode('-', str_split($secret, 4)) }}</h1>
                            </strong></p>

                        {{-- <div>
                        <img src="{{ $QR_Image }}">
                    </div> --}}
                        <p>Debe configurar su aplicación Google Authenticator antes de continuar. De lo contrario, no podrá
                            iniciar sesión</p>
                        <div>
                            <a href="{{ route('complete.registration') }}" class="btn btn-primary">Completar Registro</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
