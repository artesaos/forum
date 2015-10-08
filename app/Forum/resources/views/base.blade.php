@extends('core::base')

@section('core.header_menu')
    <ul class="nav navbar-nav">
        <li class="{{ request()->is('/') ? 'active' : null }}">
            <a href="{{ url() }}">Home</a>
        </li>
    </ul>
    <ul class="nav navbar-right navbar-nav">
        @if(Auth::check())
            <li>
                <a href="javascript:;">{{ Auth::user()->username }}</a>
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