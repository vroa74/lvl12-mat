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
        
        <!-- Theme Script -->
        <script>
            // Función global para cambiar tema (se define aquí primero)
            window.changeTheme = function(theme) {
                console.log('Cambiando tema a:', theme);
                const html = document.documentElement;
                
                // Forzar remoción de clase dark
                html.classList.remove('dark');
                
                // Aplicar nuevo tema
                if (theme === 'dark') {
                    html.classList.add('dark');
                    console.log('Tema oscuro aplicado');
                } else {
                    console.log('Tema claro aplicado');
                }
                
                // Verificación múltiple para asegurar que se aplique
                setTimeout(() => {
                    if (theme === 'dark' && !html.classList.contains('dark')) {
                        html.classList.add('dark');
                        console.log('Forzando tema oscuro - verificación 1');
                    }
                }, 10);
                
                setTimeout(() => {
                    if (theme === 'dark' && !html.classList.contains('dark')) {
                        html.classList.add('dark');
                        console.log('Forzando tema oscuro - verificación 2');
                    }
                }, 100);
                
                setTimeout(() => {
                    console.log('Estado final:', {
                        theme: theme,
                        hasDark: html.classList.contains('dark'),
                        classes: html.className
                    });
                }, 200);
            };

            document.addEventListener('DOMContentLoaded', function() {
                // Aplicar tema inicial desde la base de datos
                @if(Auth::check())
                    const userTheme = '{{ Auth::user()->theme ?? "light" }}';
                    console.log('Tema inicial del usuario:', userTheme);
                    
                    // Usar la función global
                    window.changeTheme(userTheme);
                @endif
            });
        </script>

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
</html>
