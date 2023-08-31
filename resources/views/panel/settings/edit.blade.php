@extends('panel.app')
@section('content')
    <p>Editar configuración de la plataforma</p>

    <form action="{{ route('panel.settings.update') }}" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="row">
            <h5>Información básica</h5>
            <div class="col-sm-12 col-lg-4">
                <div class="input-group mb-3 mt-4">
                    <label class="input-group-text" for="logo">Subir logo</label>
                    <input type="file" accept="image/*" name="logo" class="form-control" id="logo">
                </div>
            </div>

            <div class="col-sm-12 col-lg-4">
                <div class="form-group">
                    <label for="name">Nombre de usuario</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                </div>
            </div>

            <div class="col-sm-12 col-lg-4">
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                </div>
            </div>

            <h5 class="my-4">Información de mensajería</h5>

            <div class="col-sm-12 col-lg-3">
                <div class="form-group">
                    <label for="mail_mailer">Servicio de mensajería</label>
                    <input type="text" name="mail_mailer" class="form-control"
                        value="{{ old('mail_mailer', $mail_mailer) }}">
                </div>
            </div>

            <div class="col-sm-12 col-lg-3">
                <div class="form-group">
                    <label for="mail_host">Servidor de mensajería</label>
                    <input type="text" name="mail_host" class="form-control" value="{{ old('mail_host', $mail_host) }}">
                </div>
            </div>

            <div class="col-sm-12 col-lg-3">
                <div class="form-group">
                    <label for="mail_port">Puerto de mensajería</label>
                    <input type="text" name="mail_port" class="form-control" value="{{ old('mail_port', $mail_port) }}">
                </div>
            </div>

            <div class="col-sm-12 col-lg-3">
                <div class="form-group">
                    <label for="mail_encryption">Encriptación</label>
                    <input type="text" name="mail_encryption" class="form-control"
                        value="{{ old('mail_encryption', $mail_encryption) }}">
                </div>
            </div>

            <div class="col-sm-12 col-lg-4 mt-3">
                <div class="form-group">
                    <label for="mail_username">Correo de salida de la mensajería</label>
                    <input type="text" name="mail_username" class="form-control"
                        value="{{ old('mail_username', $mail_username) }}">
                </div>
            </div>

            <div class="col-sm-12 col-lg-4 mt-3">
                <div class="form-group">
                    <label for="mail_from_address">Alias del correo electrónico</label>
                    <input type="text" name="mail_from_address" class="form-control"
                        value="{{ old('mail_from_address', $mail_from_address) }}">
                </div>
            </div>

            <div class="col-sm-12 col-lg-4 mt-3">
                <div class="form-group">
                    <label for="mail_password">Contraseña del correo electrónico</label>
                    <input type="password" name="mail_password" class="form-control"
                        value="{{ old('mail_password', $mail_password) }}">
                </div>
            </div>

            <h5 class="my-4">Información de Amazon</h5>

            <div class="col-sm-12 col-lg-6 mb-3">
                <div class="form-group">
                    <label for="aws_access_key_id">AWS Access Key ID</label>
                    <input type="text" name="aws_access_key_id" class="form-control"
                        value="{{ old('aws_access_key_id', $aws_access_key_id) }}">
                </div>
            </div>

            <div class="col-sm-12 col-lg-6 mb-3">
                <div class="form-group">
                    <label for="aws_secret_access_key">AWS Secret Access Key</label>
                    <input type="password" name="aws_secret_access_key" class="form-control"
                        value="{{ old('aws_secret_access_key', $aws_secret_access_key) }}">
                </div>
            </div>

            <div class="col-sm-12 col-lg-6 mb-3">
                <div class="form-group">
                    <label for="aws_default_region">Región</label>
                    <input type="text" name="aws_default_region" class="form-control"
                        value="{{ old('aws_default_region', $aws_default_region) }}">
                </div>
            </div>

            <div class="col-sm-12 col-lg-6 mb-3">
                <div class="form-group">
                    <label for="aws_bucket">Nombre del bucket</label>
                    <input type="text" name="aws_bucket" class="form-control"
                        value="{{ old('aws_bucket', $aws_bucket) }}">
                </div>
            </div>

            <div class="col-sm-12 text-end mt-4">
                <button type="submit" class="btn btn-primary">
                    Actualizar
                </button>
            </div>
        </div><!-- .row -->
    </form>
@stop
