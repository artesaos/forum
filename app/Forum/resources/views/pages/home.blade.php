@extends('front::base')

@section('base:body')
    <header id="home-header">
        <div class="header-content">
            <div class="header-content-inner">
                <h1>{{ $quote }}</h1>
            </div>
        </div>
    </header>
@endsection