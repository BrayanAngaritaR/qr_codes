@extends('panel.app')
@section('content')
    <div class="container-fluid">
        <form class="mt-4" action="{{ route('panel.qr.update', $code) }}" method="POST">
            @csrf
            <div class="form-check form-check-inline">
                <input @checked($code->type === 'website') class="form-check-input" type="radio" name="qrType" id="websiteItem"
                    value="website">
                <label class="form-check-label" for="websiteItem">Sitio web</label>
            </div>
            <div class="form-check form-check-inline">
                <input @checked($code->type === 'text') class="form-check-input" type="radio" name="qrType" id="textItem"
                    value="text">
                <label class="form-check-label" for="textItem">Texto</label>
            </div>

            <div class="mb-3 mt-4">
                <label for="contentItem" id="labelContentItem" class="form-label">Contenido</label>
                <input type="text" name="content" value="{{ $code->redirect_to }}"
                    class="form-control @error('content') is-invalid                    
                @enderror"
                    id="contentItem" aria-describedby="emailHelp">
                <p class="text-danger">
                    @error('content')
                        {{ $message }}
                    @enderror
                </p>
                <div id="emailHelp" class="form-text">Ingresa la URL o la información que deseas agregar</div>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@stop
