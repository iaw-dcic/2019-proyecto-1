<link type="text/css" href="{{ asset('css/search.css') }}" rel="stylesheet">

<div class="row justify-content-center">
    <div class="col-lg-8 col-sm-6">
        <div class="card hovercard">
            <div class="cardheader">
            </div>
            <div class="avatar">
                <img alt="avatar" src="../{{ Request::get('avatar') }}">
            </div>
            <div class="info">
                <div class="title">
                    <a href="{{ url('profile/') }}/{{ Request::get('id') }}">{{ Request::get('name') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>