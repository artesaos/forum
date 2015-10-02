<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {!! app('seotools')->generate() !!}
    <link rel="stylesheet" href="{{ elixir('css/front.css') }}"/>
</head>
<body>

@section('base:header')
    <header class="navbar navbar-default navbar-fixed-top" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Forum Laravel Brasil</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{ url() }}" class="navbar-brand">Forum Laravel Brasil</a>
            </div>
            <nav class="collapse navbar-collapse" role="navigation">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ url() }}">Home</a>
                    </li>
                </ul>
                <ul class="nav navbar-right navbar-nav">
                    @if(Auth::check())
                        <li>
                            <a href="#">{{ Auth::user()->username }}</a>
                        </li>
                    @else
                        <li>
                            <a href="#">Cadastre-se [WIP]</a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>
@show

<div class="container">
    <div class="col-md-8 col-md-push-2">
        @include('flash::message')
    </div>
</div>

@yield('base:body')
</body>
</html>