@extends('panel.app')
@section('content')
    <div class="container-fluid">
        <form class="mt-4" action="{{ route('panel.qr.store') }}" method="POST">
            @csrf
            <div class="form-check form-check-inline">
                <input @checked(old('qrType') === 'website') class="form-check-input" type="radio" name="qrType" id="websiteItem"
                    value="website">
                <label class="form-check-label" for="websiteItem">Sitio web</label>
            </div>
            <div class="form-check form-check-inline">
                <input @checked(old('qrType') === 'text') class="form-check-input" type="radio" name="qrType" id="textItem"
                    value="text">
                <label class="form-check-label" for="textItem">Texto</label>
            </div>
            <div class="form-check form-check-inline">
                <input @checked(old('qrType') === 'email') class="form-check-input" type="radio" name="qrType" id="emailItem"
                    value="email">
                <label class="form-check-label" for="emailItem">Correo electrónico</label>
            </div>

            <div class="mb-3 mt-4">
                <label for="contentItem" id="labelContentItem" class="form-label">Contenido</label>
                <input type="text" name="content" value="{{ old('content') }}"
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

            <div id="emailContent" @if (old('qrType') != 'email') class="d-none" @endif>
                <div class="mb-3 mt-4">
                    <label for="subjectItem" class="form-label">Asunto</label>
                    <input type="text" maxlength="50" value="{{ old('subject') }}"
                        placeholder="Me he registrado en www.bepro.digital" name="subject"
                        class="form-control @error('subject') is-invalid                    
                        @enderror"
                        id="subjectItem" aria-describedby="emailHelp">
                    <p class="text-danger">
                        @error('subject')
                            {{ $message }}
                        @enderror
                    </p>
                </div>

                <div class="mb-3 mt-4">
                    <label for="messageItem">Mensaje</label>
                    <textarea name="message" id="messageItem"
                        placeholder="Hola, te quiero contar que me he registrado en BePro Digital y me he suscrito en el canal de YouTube."
                        rows="3" maxlength="300"
                        class="form-control @error('message') is-invalid                    
                        @enderror">{{ old('message') }}</textarea>
                    <p class="text-danger">
                        @error('message')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@stop

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js"
        integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $('input[type=radio][name=qrType]').on('change', function() {
            switch ($(this).val()) {
                case 'email':
                    $("#emailContent").removeClass('d-none');
                    $('#labelContentItem').text("Correo electrónico de destino");
                    $('#emailHelp').text(
                        "Ingresa el correo electrónico al que quieres que llegue el mensaje. Ej: info@bepro.digital"
                    );
                    break;
                default:
                    $("#emailContent").addClass('d-none');
                    $('#labelContentItem').text("Contenido");
                    $('#emailHelp').text(
                        "Ingresa la URL o la información que deseas agregar"
                    );
                    break;
            }
        });
    </script>
@endpush
