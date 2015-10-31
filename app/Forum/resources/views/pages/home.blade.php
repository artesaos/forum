@extends('forum::layouts.full')

@section('forum.body')
    <div id="masthead">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h1>Forum Laravel Brasil
                        <p class="lead">Um forum para artesaos</p>
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach($questions as $question)
                    @include('forum::questions.parts.loop-row')
                    <hr>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-push-2">
                <a href="{{ route('questions.index') }}" class="btn btn-info btn-block">Perguntas</a>
            </div>
        </div>
    </div>

@endsection
