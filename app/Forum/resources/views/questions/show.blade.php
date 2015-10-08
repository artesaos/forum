@extends('forum::layouts.full')

@section('forum.body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">

                        <div class="row question-row">
                            <div class="col-md-2 col-sm-3 text-center">
                                <a class="question-avatar" href="javascript:;">
                                    <img src="{{ $question->user->present()->avatar() }}"
                                         alt="{{ $question->user->name }}"
                                         class="img-circle">
                                </a>
                            </div>
                            <div class="col-md-10 col-sm-9">
                                <h3>
                                    {{ $question->title }}
                                </h3>
                                <div>
                                    {!! $question->present()->categoriesLabels() !!}
                                </div>


                                <hr />

                                {{ $question->body }}

                                <hr />

                                <h2> {{ count($question->answer) }} resposta(s)</h2>

                                <br />

                                @foreach($question->answer as $answer)

                                    <div class="row">
                                        <div class="col-sm-1">
                                            <img src="{{ $answer->user->present()->avatar(50) }}"
                                                 alt="{{ $answer->user->name }}"
                                                 class="img-circle">
                                        </div>
                                        <div class="col-sm-11">
                                            {!! $answer->body !!}}
                                        </div>
                                    </div>
                                    <hr>

                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
