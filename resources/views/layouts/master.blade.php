<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.head')
    </head>
    <body>

        @include('includes.nav');

        <div class="container">
            @yield('content')
        </div>

        @include('includes.footer')
    </body>
</html>