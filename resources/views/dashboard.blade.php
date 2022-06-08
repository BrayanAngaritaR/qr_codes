@extends('panel.app')
@section('content')
   <p>Hola, {{ Auth::user()->name  }}</p>
@stop