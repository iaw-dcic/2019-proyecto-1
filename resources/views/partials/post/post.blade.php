<?php
    use Carbon\Carbon;

    function calcularTiempo($fecha){
        $now = Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires'));
        $dif = $now->diffInMinutes($fecha);
        switch($dif){
            case ($dif < 60):
                $dif = $now->diffInMinutes($fecha). ' minutos';
                break;
            case ($dif >=60 && $dif < 1440):
                $dif = $now->diffInHours($fecha) . ' horas';
                break;
            case ($dif >= 1440 && $dif < 43800):
                $dif = $now->diffInDays($fecha) . ' días';
                break;
            case ($dif >= 43800 && $dif < 525600):
                $dif = $now->diffInMonths($fecha) . ' meses';
                break;
            default:
                $dif = $now->diffInYears($fecha) . ' meses';
                break;
        }
        return 'Hace '.$dif;
    }
?>

<div class="modal fade" id="modal-post" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <!--HEADER-->
            <div class="modal-header">
                <div class="modal-title">
                    <div class="row align-items-center">
                        <a href="/user/{{$user->username}}"><img src="{{ url('/storage/users/' . $user->photo) }}" class="img-fluid img-thumbnail"></a>

                        <div class="col-7 col-sm-8">
                            <div class="row">
                                <a class="col-12" href="/user/{{$user->username}}"><p class="username">{{ $user->username }}</p></a>
                                <a class="col-12" href="/user/{{$user->username}}"><p class="name">{{$user->name}}</p></a>
                            </div>
                        </div>

                        <!--Botones que solo aparecen si el usuario es el mismo que el logueado-->
                        @if(Auth::user() != null && Auth::user()->username == $user->username)
                        <div class="col-1 dropdown justify-self-end d-flex justify-content-end">
                            <a class="btn" id="dropdownPostButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-chevron-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownPostButton m-0 p-0">
                                <a class="dropdown-item" href="#" id="btn-editar-post">Editar post</a>
                                <a class="dropdown-item" href="#" id="btn-editar-post">Borrar post</a>
                            </div>
                        </div>
                        @endif()

                        <div class="col justify-self-end d-flex justify-content-end mr-3 p-0">
                            <button type="button" class="close" id="btn-cerrar-post" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--BODY-->
            <div class="modal-body">
                <div id="carousel-post" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($photos as $photo)
                            @if($photo != $post->getPhotos()->get()->first())
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ url('/storage/photos/'.$photo->photo_url) }}">
                                </div>
                            @else()
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{ url('/storage/photos/'.$photo->photo_url) }}">
                                </div>
                            @endif()
                        @endforeach()
                    </div>

                    <a class="carousel-control-prev" href="#carousel-post" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-post" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <!--FOOTER-->
            <div class="modal-footer">
                <div class="container-fluid m-0 p-0">
                    <?php
                        $comments = App\Comment::where('post_id', $post->id)->orderBy('created_at', 'asc')->get();
                    ?>

                    <div class="row justify-content-start botones-post">
                        <button href="" @guest disabled @endguest onclick="document.getElementById('comentario').focus()" id="contador-comentarios">
                            <i class="far fa-comment"></i>
                            <span>{{$comments->count()}}</span>
                        </button>
                        <p class="fecha">{{ calcularTiempo($post->created_at) }}</p>
                    </div>
                    <div class="row descripcion">
                        <p>{{$post->description}}</p>
                    </div>

                    <div class="row comentarios">
                    @foreach($comments as $comment)
                        <?php $comment_user = App\User::find($comment->user_id); ?>
                        <p class="col-12 comentario">
                            <a href="/user/{{$comment_user->username}}">{{$comment_user->username}}</a>
                            {{$comment->content}}
                        </p>
                    @endforeach()
                    </div>

                    <!--Solo puede comentar el usuario que está logueado-->

                    <div class="row agregar-comentario">
                        <form id="form-agregar-comentario" data-url="/posts/{{$post->id}}/comments" autocomplete="off">
                        @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" id="content" name="content" placeholder="Agregar comentario..." aria-describedby="agregar-comentario-prepend" @guest disabled autofocus @endguest required>
                                @if(Auth::user() != null)
                                <input type="hidden" name="username" value="{{Auth::user()->username}}">
                                @endif
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-success" @guest disabled @endguest id="agregar-comentario">
                                        <i class="far fa-comment-dots"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
