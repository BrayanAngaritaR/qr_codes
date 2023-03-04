@extends('panel.app')
@section('content')
    <p>Hola, {{ $user->name }}</p>

    <div class="row mt-4 text-center">
        <div class="col-sm-12 col-md-6">
            <h1>{{ $qr_count }}</h1>
            <h5>Total de códigos QR</h5>
        </div>
        <div class="col-sm-12 col-md-6">
            <h1>{{ $visits }}</h1>
            <h5>Visitas a tus códigos QR</h5>
        </div>
    </div>
@stop
