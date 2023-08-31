@extends('panel.app')
@section('content')
    <p>Configuración de la plataforma</p>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre de usuario</th>
                    <th scope="col">Correo electrónico</th>
                    <th scope="col">Logo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $logo ? $logo : 'Por defecto' }}</td>
                </tr>
            </tbody>
        </table>

        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <h6 class="my-4">Configuración de mensajería</h6>
                <table class="table table-hover mx-auto w-100">
                    <tbody>
                        <tr>
                            <td>Servicio de mensajería:</td>
                            <td>{{ $mail_mailer }}</td>
                        </tr>
                        <tr>
                            <td>Servidor de mensajería:</td>
                            <td>{{ $mail_host }}</td>
                        </tr>
                        <tr>
                            <td>Puerto de mensajería:</td>
                            <td>{{ $mail_port }}</td>
                        </tr>
                        <tr>
                            <td>Correo de salida de la mensajería:</td>
                            <td>{{ $mail_username ? $mail_username : 'Sin definir' }}</td>
                        </tr>
                        <tr>
                            <td>Encriptación del correo electrónico:</td>
                            <td>{{ $mail_encryption ? $mail_encryption : 'Sin definir' }}</td>
                        </tr>
                        <tr>
                            <td>Alias del correo electrónico:</td>
                            <td>{{ $mail_from_address }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <div class="col-sm-12 col-lg-6">
                <h6 class="my-4">Información de Amazon</h6>

                <table class="table table-hover mx-auto w-100">
                    <tbody>
                        <tr>
                            <td>AWS Access Key ID:</td>
                            <td>{{ $aws_access_key_id ? $aws_access_key_id : '***********************' }}</td>
                        </tr>
                        <tr>
                            <td>AWS Secret Access Key:</td>
                            <td>{{ $aws_secret_access_key ? $aws_secret_access_key : '***********************' }}</td>
                        </tr>
                        <tr>
                            <td>Región:</td>
                            <td>{{ $aws_default_region }}</td>
                        </tr>
                        <tr>
                            <td>Nombre del bucket:</td>
                            <td>{{ $aws_bucket ? $aws_bucket : 'Sin definir' }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="col-sm-12 text-end mt-4">
                <a href="{{ route('panel.settings.edit') }}" class="btn btn-primary">
                    Editar
                </a>
            </div>
        </div><!-- .row -->
    </div>
@stop
