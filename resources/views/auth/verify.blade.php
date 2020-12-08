@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verificá tu dirección de Correo Electrónico') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Enviamos un link de verificación a tu dirección de Correo Electrónico') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, consulte su correo electrónico para ver si hay un enlace de verificación.') }}
                    {{ __('Si no recibió el correo electrónico') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('haga clic aquí para reenviar el correo') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
