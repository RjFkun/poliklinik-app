<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'Admin Dashboard' }}</title>

  {{-- =======================================================
      OPSI 1: PAKAI FILE LOKAL VIA VITE (HANYA JIKA NPM RUN DEV)
      Jika tidak menggunakan Vite, hapus baris ini.
  ======================================================== --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  {{-- =======================================================
      OPSI 2: PAKAI CDN (TIDAK PERLU VITE)
      Jika pakai ini, bisa hapus @vite di atas.
  ======================================================== --}}

  <!-- Font Awesome 6.2 -->
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-Htsm8V27GzBwrVsh7E1yTF1p4cJrjZnmRk9L7ukSW3XqQOpxJQ/kkHyGEES1yEYN4PKXYK6+NwGM0AzE+3p9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Bootstrap 4.6 (versi yang sesuai untuk AdminLTE 3.1) -->
  <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
        crossorigin="anonymous">

  <!-- AdminLTE 3.1 -->
  <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">

  @stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    {{-- Sidebar --}}
    @include('components.partials.sidebar')

    {{-- Content --}}
    <div class="content-wrapper">
      @include('components.partials.header')
      {{ $slot }}
    </div>

    {{-- Footer --}}
    @include('components.partials.footer')

  </div>

  {{-- =======================================================
      JAVASCRIPT CDN (URUTANNYA PENTING)
  ======================================================== --}}

  <!-- jQuery 3.6 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
          integrity="sha512-pvN+3YoUuXvZBvH1d6qP4Rx4mBzUMAnPaZC7B8DAIG7N9pUHVWAZrGk9XudxLB0ks9UHRtboRa3Yd5FprN3wEA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Bootstrap 4.6 Bundle (termasuk Popper.js) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2LcT9GZHQOr27yRzxzXj7Vmr8Q6Y7Am3F8PZyf9OGB"
          crossorigin="anonymous"></script>

  <!-- AdminLTE App -->
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>

  @stack('scripts')
</body>
</html>
