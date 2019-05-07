<section class="container-fluid m-0 p-0 no-gutters actividad">
    <div class="row no-gutters justify-content-between align-items-center grid-figures contenido-actividad">
        <!--Figures-->

        @if(isset($posteos) && count($posteos) > 0)
            @foreach($posteos as $post)
            <article class="col-12 col-md-5 col-lg-2 posts" data-target="#modal-post" data-post="{{$post}}">
                <figure data-toggle="modal">
                    <img class="img-fluid img-thumbnail"
                        src="{{ $post->getPhotos()->get()->first()->photo_url }}">
                    <figcaption>
                        <h2>&#64{{ App\User::find($post->user_id)->username }}</h2>
                        @auth
                        <i class="far fa-comment"></i>
                        @endauth
                    </figcaption>
                </figure>
            </article>
            @endforeach()

            <article class="col-12 col-md-5 col-lg-2"></article>

            @if(isset($page))
            <div class="col-12 d-flex justify-content-center">
                <nav aria-label="pagination">
                    <ul class="pagination">
                        @if($page-1 > 0)
                        <li class="page-item"><a class="page-link" href="?page={{$page-1}}#actividad-publica">Anterior</a></li>
                        @endif
                        @if($page-1 > 0)
                        <li class="page-item"><a class="page-link" href="?page={{$page-1}}#actividad-publica">{{$page-1}}</a></li>
                        @endif
                        <li class="page-item active"><a class="page-link" href="?page={{$page}}#actividad-publica">{{$page}}</a></li>
                        <li class="page-item"><a class="page-link" href="?page={{$page+1}}#actividad-publica">{{$page+1}}</a></li>
                        <li class="page-item"><a class="page-link" href="?page={{$page+1}}#actividad-publica">Siguiente</a></li>
                    </ul>
                </nav>
            </div>
            @endif
        @else
            @auth
            <div class="col d-flex justify-content-center align-items-center no-hay-posts">
                <h3>No hay publicaciones <a href="#" data-toggle="modal" data-target="#crearPost" class="nav-link" id="subir-foto">¡Haz la primera!</a>
                </h3>
            </div>
            @endauth
        @endif
    </div>
</section>
