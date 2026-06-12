<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('/assets/img/favicon.png') }}">
    <title>@yield('title', 'Parkir Dashboard')</title>

    {{-- Preload font utama (Latin) agar tidak Flash of Unstyled Text --}}
    <link rel="preload" href="{{ asset('/assets/fonts/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS-muw.woff2') }}"
        as="font" type="font/woff2" crossorigin="anonymous">

    {{-- Font lokal saja (Latin-only, 4 @font-face vs 40 sebelumnya) --}}
    <link href="{{ asset('/assets/css/font-latin-only.css') }}" rel="stylesheet" />

    {{-- Icon fonts lokal --}}
    <link href="{{ asset('/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    {{-- Dashboard CSS (minified) --}}
    <link id="pagestyle" href="{{ asset('/assets/css/soft-ui-dashboard.min.css?v=1.0.7') }}" rel="stylesheet" />

    {{-- SweetAlert CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.css') }}">
</head>

<body class="g-sidenav-show bg-gray-100">

    {{-- Sidebar menu --}}
    @yield('menu')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

        {{-- Konten halaman --}}
        @yield('main')

        <footer class="footer pt-3">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            &copy; <script>document.write(new Date().getFullYear())</script> Parkir Dashboard
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </main>

    {{-- =============================================
         JS — semua defer agar tidak blokir rendering
         ============================================= --}}

    {{-- Font Awesome (icon) - 1.6MB, wajib defer --}}
    <script src="{{ asset('assets/js/plugins/all.js') }}" defer crossorigin="anonymous"></script>

    {{-- Bootstrap core --}}
    <script src="{{ asset('be/assets/js/core/popper.min.js') }}" defer></script>
    <script src="{{ asset('be/assets/js/core/bootstrap.min.js') }}" defer></script>

    {{-- Scrollbar plugins (hanya aktif di Windows) --}}
    <script src="{{ asset('be/assets/js/plugins/perfect-scrollbar.min.js') }}" defer></script>
    <script src="{{ asset('be/assets/js/plugins/smooth-scrollbar.min.js') }}" defer></script>

    {{-- Soft UI controller --}}
    <script src="{{ asset('be/assets/js/soft-ui-dashboard.min.js?v=1.0.7') }}" defer></script>

    {{-- SweetAlert (lokal, 1 sumber saja) --}}
    <script src="{{ asset('assets/js/plugins/sweetalert2.min.js') }}" defer></script>

    {{-- Inisialisasi scrollbar (Windows) --}}
    <script defer>
        document.addEventListener('DOMContentLoaded', function () {
            if (navigator.platform.indexOf('Win') > -1) {
                var el = document.querySelector('#sidenav-scrollbar');
                if (el) Scrollbar.init(el, { damping: '0.5' });
            }
        });
    </script>

    {{-- Flash message via SweetAlert --}}
    @if (session('success') || session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'BERHASIL',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
            @elseif (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'GAGAL!',
                text: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 2000
            });
            @endif
        });
    </script>
    @endif

    {{-- Konfirmasi hapus --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.addEventListener('click', function (e) {
                var btn = e.target.closest('.btn-delete');
                if (!btn) return;
                e.preventDefault();
                var id = btn.dataset.id;
                var form = document.getElementById('delete-form-' + id);
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: 'Data ini akan dihapus permanen!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then(function (result) {
                    if (result.isConfirmed && form) form.submit();
                });
            });
        });
    </script>

    {{-- Slot untuk script tambahan dari halaman child --}}
    @stack('scripts')

</body>
</html>


