@extends('forum::layouts.full')

@section('forum.body')
    <div class="container">
        <div class="row">
            <div class="col-md-12 page-header">
                <h2>Perguntas <span class="badge"> {{ $questions->total() }}</span></h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @foreach($questions as $question)
                    @include('forum::questions.parts.loop-row')
                    <hr>
                @endforeach
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                {!! $questions->render() !!}
            </div>
        </div>
    </div>

@endsection
