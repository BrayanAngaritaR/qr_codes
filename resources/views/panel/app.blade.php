<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&amp;display=swap" />
    <link href="{{ asset('panel/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/css/root.min.css') }}" />

    @stack('styles')
    <title>Panel de administración - BePro Digital</title>
</head>

<body id="body">
    <div class="menu-container" id="navbar">
        @include('panel.includes._menu')
    </div>

    <div id="app" class="container-fluid">
        <h3 class="lead">Panel de administración</h3>
        @yield('content')
    </div>
</body>

<script src="{{ asset('panel/js/bootstrap.bundle.min.js') }}"></script>

<script type="text/javascript" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script type="text/javascript" src="{{ asset('panel/js/app.js') }}"></script>

{{-- Validar si tenemos un mensaje de sesión --}}
@if (Session::has('info'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: '{{ Session::get('info')[0] }}',
            title: '{{ Session::get('info')[1] }}'
        })
    </script>
@endif

@stack('scripts')

</html>
