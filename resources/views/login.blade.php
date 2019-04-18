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
            <!-- Tabs Titles -->
        
            <!-- Icon -->
            <div class="fadeIn first">
                    <span class="glyphicon glyphicon-user"></span>
            </div>
            
            <!-- Social media icons -->
            <div class="fadeIn second">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-google"></a>
            </div>

            <!-- Login Form -->
            <form>
            <input type="text" id="username" class="fadeIn third" name="login" placeholder="username">
            <input type="password" id="password" class="fadeIn third password" name="login" placeholder="password">
            <input type="submit" class="fadeIn fourth" value="Log In">
            </form>
        
            <!-- Remind Passowrd -->
            <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
            </div>
        
        </div>
    </div>
@endsection