<!-- Footer section -->
<footer class="footer-section">
    <div class="container">
        <div class="footer-left-pic">
            <!--<img src="img/prueba1.png" alt=""> -->
            <img src="{{asset('img/footer-left-pic.webp')}}">
        </div>
        <div class="footer-right-pic">
            <img src="{{asset('img/footer-right-pic.png')}}">
        </div>
        <a href="#" class="footer-logo">
            <img src="{{asset('/img/logo.png')}}">
        </a>
        <ul class="main-menu footer-menu">
            <li><a href="/">Inicio</a></li>
            <li><a href="{{route('listings.index')}}">Listas</a></li>
            @guest
                <li><a href="{{ url('login') }}">Ingresar</a> </li>
                <li><a href="{{ url('register') }}">Registrarse</a> </li>
            @endguest 
            <li><a href="{{url('about') }}">Preguntas frecuentes</a></li>
        </ul>
        
       
    </div>
</footer>
<!-- Footer section end -->