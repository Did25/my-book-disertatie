<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased" >
        <div style="background-color: burlywood ;">
            <div class="sticky">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header>
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 header-content">
                    {{ $header }}
                </div>
            </header>
            </div>
            <!-- Page Content -->
            <main style="background-color: burlywood;">
                {{ $slot }}
            </main>
            <footer>
                Copyright@Diana Lapusneanu <script>document.write(new Date().getFullYear())</script>
            </footer>
        </div>
    </body>
</html>


