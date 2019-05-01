<section class="container-fluid m-0 p-0 no-gutters actividad">
    <div class="row no-gutters justify-content-between align-items-center grid-figures contenido-actividad">
        <!--Figures-->

        @if(isset($posteos))
            @foreach($posteos as $post)
            <article class="col-12 col-md-5 col-lg-2 posts" data-target="#modal-post" data-post="{{$post}}">
                <figure data-toggle="modal">
                    <img class="img-fluid img-thumbnail"
                        src="{{ url('/storage/photos/'.$post->getPhotos()->get()->first()->photo_url) }}">
                    <figcaption>
                        <h2>&#64{{ App\User::where('id', $post->user_id)->get()->first()->username }}</h2>
                        @auth
                        <i class="far fa-comment"></i>
                        @endauth
                    </figcaption>
                </figure>
            </article>
            @endforeach()

            <article class="col-12 col-md-5 col-lg-2"></article>
        @endif()
    </div>
</section>
