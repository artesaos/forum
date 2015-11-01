@extends('core::base')

@section('core.header_menu')
    <ul class="nav navbar-nav">
        <li class="{{ request()->is('/') ? 'active' : null }}">
            <a href="{{ url() }}"> <i class="fa fa-home "></i> Home</a>
        </li>
        <li class="{{ request()->is('questions*') ? 'active' : null }}">
            <a href="{{ route('questions.index') }}"> <i class="fa fa-question-circle "></i> Perguntas</a>
        </li>
    </ul>
    <ul class="nav navbar-right navbar-nav">
        @if(Auth::check())
            <li>
                <a href="javascript:;">
                @if(Auth::user()->username)
                    {{ Auth::user()->username }}
                @else
                    {{ Auth::user()->name }}
                @endif
                </a>
            </li>
            <li>
                <a href="{{route('auth.logout')}}">Sair</a>
            </li>
        @else
            <li class="{{ request()->is('auth/register') ? 'active' : null }}">
                <a href="{{route('auth.register')}}">Cadastre-se</a>
            </li>
            <li class="{{ request()->is('auth') ? 'active' : null }}">
                <a href="{{route('auth.index')}}">Logar</a>
            </li>
        @endif
    </ul>
@endsection