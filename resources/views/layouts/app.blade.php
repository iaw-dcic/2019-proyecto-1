@include('partials._head')

<body>
    @include('partials._header') 
    @yield('content')
    @include('partials._footer')
    @include('partials._javascript')
</body>

</html>