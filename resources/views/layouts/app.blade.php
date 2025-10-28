<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tesda') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('registered'))
<script>
Swal.fire({
    icon: 'success',
    title: '🎉 Registration Successful',
    text: '{{ session('registered') }}',
    showConfirmButton: true,
});
</script>
@endif

@if (session('error'))
<script>
Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: '{{ session('error') }}',
    showConfirmButton: true,
});
</script>
@endif

@if ($errors->any())
<script>
Swal.fire({
    icon: 'error',
    title: 'Validation Error',
    html: `{!! implode('<br>', $errors->all()) !!}`,
    showConfirmButton: true,
});
</script>
@endif
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
<script>
Swal.fire({
  icon: 'success',
  title: 'Login Successful!',
  text: '{{ session('success') }}',
  showConfirmButton: false,
  timer: 2000,
  timerProgressBar: true
})
</script>
@endif
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.getElementById('logoutBtn').addEventListener('click', function () {
    Swal.fire({
        title: 'Are you sure you want to logout?',
        text: "You'll be signed out of your account.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, logout',
        background: '#fff',
        color: '#333',
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('logoutForm').submit();
        }
    });
});
</script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <!-- Navigation could go here -->

    <!-- Page Content -->
    <main class="p-4">
        {{-- ✅ For Blade components --}}
        {{ $slot ?? '' }}

        {{-- ✅ For classic Blade templates --}}
        @yield('content')
    </main>
</body>
</html>
