<div class="container-fluid no-gutters container-profile">

    @include('partials.profile.edit-perfil')
    @include('partials.profile.foto-perfil')

    <div class="row no-gutters row-perfil align-items-center">
        <div class="col-12 col-md-3 d-flex justify-content-center justify-content-md-end foto-perfil no-gutters">
            <a href="#" data-toggle="modal" data-target="#cambiarFotoPerfil" aria-label="Cambiar foto de perfil">
                <img src="{{ $user->photo_url ?: url('storage/users/no_photo.png') }}" alt="Foto de perfil" class="img-fluid img-thumbnail" id="foto_perfil_usuario">
            </a>
        </div>

        <div class="col-12 col-md-9 justify-content-center justify-content-md-end btn-profile no-gutters">

            @if(Auth::user() != null && Auth::user()->username == $user->username)
            <div class="d-flex justify-content-center justify-content-md-start text-center text-md-left botones-perfil">
                <a href="#" data-toggle="modal" data-target="#crearPost" aria-label="Crear post"><i class="fas fa-plus btn-profile"></i></a>
                <a href="#" data-toggle="modal" data-target="#editarPerfil" aria-label="Editar perfil"><i class="far fa-edit btn-profile"></i></a>
            </div>
            @endif()

            <div class="info-perfil text-center text-md-left">
                <p class="name"> {{$user->name}}</p>
                <p class="username">&#64;{{$user->username}}</p>
                <p class="biography">{{$user->biography}}</p>
            </div>
        </div>
    </div>

    <div class="row no-gutters barra-actividad" id="actividad-publica">
        <div class="col">
            <ul class="nav nav-tabs d-flex justify-content-center justify-content-md-start ml-0 ml-md-4" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="fotos-publicas-tab" data-toggle="tab" href="#fotos-publicas" role="tab" aria-controls="fotos-publicas" aria-selected="true">Fotos públicas</a>
                </li>
                @if(Auth::user() != null && Auth::user()->username == $user->username)
                <li class="nav-item">
                    <a class="nav-link" id="fotos-privadas-tab" data-toggle="tab" href="#fotos-privadas" role="tab" aria-controls="fotos-privadas" aria-selected="false">Fotos privadas</a>
                </li>
                @endif
            </ul>
        </div>
    </div>

    <div class="tab-content" id="fotos-tabs">
        <div class="tab-pane fade show active" id="fotos-publicas" role="tabpanel" aria-labelledby="fotos-publicas-tab">
            <?php $posteos = $posts_publicos ?>
            <div class="row no-gutters actividad-usuario">
                @include('partials.articles')
            </div>
        </div>
        <div class="tab-pane fade show" id="fotos-privadas" role="tabpanel" aria-labelledby="fotos-privadas-tab">
            @if($posts_privados != null)
            <?php $posteos = $posts_privados ?>
            <div class="row no-gutters actividad-usuario">
                @include('partials.articles')
            </div>
            @endif
        </div>
    </div>
</div>
