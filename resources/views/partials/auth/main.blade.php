<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


@include('partials.auth._header')

<body>
    <div id="app">

        @include('partials.app._navbar')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>


@include('partials._scripts')


</html>

