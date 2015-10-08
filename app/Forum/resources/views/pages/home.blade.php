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
                <div class="panel">
                    <div class="panel-body">

                        @foreach($questions as $question)

                        <div class="row question-row">
                            <div class="col-md-2 col-sm-3 text-center">
                                <a class="question-avatar" href="javascript:;">
                                    <img src="{{ $question->user->present()->avatar() }}"
                                         alt="{{ $question->user->username }}"
                                         class="img-circle">
                                </a>
                            </div>
                            <div class="col-md-10 col-sm-9">
                                <h3>
                                    <a href="{{ route('questions.show', $question->id) }}">{!! $question->present()->isResolvedLabel() !!} {{ $question->title }}</a>
                                </h3>
                                <div>
                                    {!! $question->present()->categoriesLabels() !!}
                                </div>
                            </div>
                        </div>

                            <hr>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
