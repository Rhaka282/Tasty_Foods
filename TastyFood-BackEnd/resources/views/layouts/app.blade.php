<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const convertConfirmForms = () => {
                    const forms = document.querySelectorAll('form[onsubmit*="confirm("]');
                    forms.forEach(form => {
                        const onSubmitAttr = form.getAttribute('onsubmit');
                        const match = onSubmitAttr.match(/confirm\(['"](.*?)['"]\)/);
                        const message = match ? match[1] : 'Apakah Anda yakin?';
                        
                        // Remove the inline onsubmit attribute to prevent the browser's native confirm popup
                        form.removeAttribute('onsubmit');
                        
                        // Bind custom SweetAlert2 confirmation
                        form.addEventListener('submit', function(e) {
                            e.preventDefault();
                            
                            Swal.fire({
                                title: 'Konfirmasi Tindakan',
                                text: message,
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#f59e0b', // Amber/Yellow
                                cancelButtonColor: '#6b7280', // Gray
                                confirmButtonText: 'Ya, Lanjutkan!',
                                cancelButtonText: 'Batal',
                                customClass: {
                                    popup: 'rounded-2xl font-sans',
                                    title: 'font-bold text-gray-900',
                                    confirmButton: 'rounded-xl px-4 py-2 text-white font-bold',
                                    cancelButton: 'rounded-xl px-4 py-2 font-bold'
                                }
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    form.submit();
                                }
                            });
                        });
                    });
                };

                // Convert immediately on load
                convertConfirmForms();

                // Watch for any dynamic changes in the DOM (e.g. Alpine.js modal/table updates)
                const observer = new MutationObserver(convertConfirmForms);
                observer.observe(document.body, { childList: true, subtree: true });
            });
        </script>
    </body>
</html>
