   <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if (Session::has('success'))
                window.Livewire.dispatch('toastMagic', {
                    status: 'success',
                    title: '{{ Session::get('success') }}',
                    options: {
                        showCloseBtn: true,
                        progressBar: true,
                        positionClass: 'toast-top-right', // Or your preferred default
                    }
                });
            @endif

            @if (Session::has('error'))
                window.Livewire.dispatch('toastMagic', {
                    status: 'error',
                    title: '{{ Session::get('error') }}',
                    options: {
                        showCloseBtn: true,
                        progressBar: true,
                        positionClass: 'toast-top-right',
                    }
                });
            @endif

            @if (Session::has('info')) // Example for other types
                window.Livewire.dispatch('toastMagic', {
                    status: 'info',
                    title: '{{ Session::get('info') }}',
                    options: {
                        showCloseBtn: true,
                        progressBar: true,
                        positionClass: 'toast-top-right',
                    }
                });
            @endif

            @if (Session::has('warning')) // Example for other types
                window.Livewire.dispatch('toastMagic', {
                    status: 'warning',
                    title: '{{ Session::get('warning') }}',
                    options: {
                        showCloseBtn: true,
                        progressBar: true,
                        positionClass: 'toast-top-right',
                    }
                });
            @endif
        });
    </script>