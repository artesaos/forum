@extends('forum::base')

@section('base:body')
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
                                <a class="question-avatar" href="#">
                                    <img src="http://api.randomuser.me/portraits/thumb/men/58.jpg" class="img-circle">
                                </a>
                            </div>
                            <div class="col-md-10 col-sm-9">
                                <h3>{{ $question->title }}</h3>
                                <div>
                                    <span class="label label-default">cats</span>
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
