<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    {!! app('seotools')->generate() !!}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{ elixir('css/front.css') }}"/>
</head>
<body>
<header id="core-header" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="{{ route('home') }}" class="navbar-brand">Forum Laravel BR</a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            @yield('core.header_menu')
        </div>
    </div>
</header>
<div id="base-container">
    <div class="container flash_message_container">
        <div class="col-md-8 col-md-push-2">
            @include('flash::message')
        </div>
    </div>
    @yield('core.body')
</div>
<!-- /#base-container -->
<footer class="footer">
    <p>Laravel</p><p class="red"><i class="fa fa-heart"></i></p><p> Copyright © Laravel Brasil.</p>        
</footer>
</body>
</html>