@extends('panel.app')
@section('content')
    <p>Lista de códigos QR</p>

    <a href="{{ route('panel.qr.create') }}" class="btn btn-primary">Agregar QR</a>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">QR</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($qr_codes as $code)
                    <tr>
                        <th scope="row">{{ $code->id }}</th>
                        <td>
                            <img src="{{ asset('storage/' . $code->path) }}" width="100" alt="">
                        </td>
                        <td>{{ $code->type }}</td>
                        <td>
                            <a href="{{ route('user.qr.show', $code) }}">Ver</a>
                            <a href="{{ route('panel.qr.edit', $code) }}">Editar</a>
                            <form action="{{ route('panel.qr.destroy', $code) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-link">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th scope="row">
                            No tienes códigos QR
                        </th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@stop
