@extends('layout')

@section('external stylesheets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/social_media_icons.css">
@endsection

@section('body')
    <div class="wrapper fadeInDown">
        <div id="formContent">
        
            <!-- Social media icons -->
            <div class="fadeIn first">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-google"></a>
            </div>

            <!-- Sign Up Form -->
            <form>
            <input type="text" id="username" class="fadeIn second" name="signup" placeholder="username">
            <input type="password" id="password" class="fadeIn second password" name="signup" placeholder="password">
            <input type="submit" class="fadeIn third" value="Sign Up">
            </form>
        
        </div>
    </div>
@endsection