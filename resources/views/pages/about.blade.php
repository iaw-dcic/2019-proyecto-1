@extends('layouts.app') 
@section('title',' | Info')

@section('content')
<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="img/page-top-bg/4.webp">
    <div class="page-info">
        <h2>Preguntas frecuentes</h2>
        <div class="site-breadcrumb">
            <a href="/">Inicio</a> /
            <span>Preguntas frecuentes</span>
        </div>
    </div>
</section>
<!-- Page top end-->

<!-- Contact page -->
<section class="contact-page">
    <div class="container" style="margin-bottom: 60px">
        <div class="panel-group" id="accordion">
            <div class="faqHeader"><i class="fa fa-question-circle-o" aria-hidden="true"></i> General </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" style="color:whitesmoke" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">¿Qué puedo hacer <strong>en Good Game? <strong></a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse">
                    <div class="panel-body">
                        En Good Game podes administrar tu inventario de juegos, creando listas y compartiéndolas con otros usuarios!
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" style="color:whitesmoke" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">¿Es necesario registrarse?</a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse in" style="color:snow">
                    <div class="panel-body">
                         Podes ver las listas públicas de otros usuarios y sus perfiles aun sin estar registrado. Para crear tus propias listas el registro es necesario.                 
                    </div>
                </div>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" style="color:whitesmoke" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">¿Por qué el sitio se llama Good Game?</a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="panel-body">
                       GG o good game es una expresión dentro del mundo gamer para reconocer una buena partida al adversario. GL&HF es otra expresión utilizada antes de una partida y significa "Good luck and have fun".
                    </div>
                </div>
            </div>
    
            <div class="faqHeader"><i class="fa fa-laptop" aria-hidden="true"></i> Funcionamiento</div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" style="color:whitesmoke" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Crear lista</a>
                    </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse">
                    <div class="panel-body">
                        Podes crear una lista sólo si iniciaste sesión. Para crearla ingresa a la opción en el menu superior. Ponele un nombre, elegí si queres que sea pública o privada y listo!.
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" style="color:whitesmoke" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Agregar juego</a>
                    </h4>
                </div>
                <div id="collapseFive" class="panel-collapse collapse">
                    <div class="panel-body">
                        Podes agregar un juego a una de tus listas seleccionándola en el menú supeior "Listas" y agregándola desde ahí. También podes seleccionar la opción "Agregar juego" y seleccionando a que listas lo querés agregar
                       
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" style="color:whitesmoke" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">¿Puedo agregar un juego a más de una lista?</a>
                    </h4>
                </div>
                <div id="collapseSix" class="panel-collapse collapse">
                    <div class="panel-body">
                            Sí, podes agregarlo a las listas que quieras!
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" style="color:whitesmoke" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">¿Qué más puedo hacer?</a>
                    </h4>
                </div>
                <div id="collapseSeven" class="panel-collapse collapse">
                    <div class="panel-body">
                        Podes editar tus listas y juegos, editar tu perfil o buscar listas de otros usuarios.    
                    </div>
                </div>
            </div>
            
            <div class="faqHeader"><i class="fa fa-copyright" aria-hidden="true"></i> Copyright</div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" style="color:whitesmoke" data-toggle="collapse" data-parent="#accordion" href="#collapseEight"> Template </a>
                    </h4>
                </div>
                <div id="collapseEight" class="panel-collapse collapse">
                    <div class="panel-body">
                        El template general del sitio pertenece a <a href="https://themewagon.com/author/kimlabs/" >Colorlib </a>
                    </div>
                </div>
            </div>

            <div class="faqHeader"><i class="fa fa-envelope-o" aria-hidden="true"></i></i> Contacto </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" style="color:whitesmoke" data-toggle="collapse" data-parent="#accordion" href="#collapseNine"> Comunicarse por mail </a>
                    </h4>
                </div>
                <div id="collapseNine" class="panel-collapse collapse">
                    <div class="panel-body">
                        Envia tu consulta o sugerencia <a href="mailto:matiasmassetti@gmail.com" target="_top">acá</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
<!-- Contact page end-->

@endsection