{{-- resources/views/layouts/partials/alerts.blade.php --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: '{{ session('success') }}',
            timer: 3000,
            showConfirmButton: false,
        });
    @elseif (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session('error') }}',
        });
    @elseif (session('warning'))
        Swal.fire({
            icon: 'warning',
            title: 'Advertencia',
            text: '{{ session('warning') }}',
        });
    @elseif (session('info'))
        Swal.fire({
            icon: 'info',
            title: 'Información',
            text: '{{ session('info') }}',
        });
    @endif
</script>
