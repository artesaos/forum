<div class="row question-row question-row-{{ $question->present()->statusClass() }}">
    <div class="col-md-1 col-sm-2 text-center">
        <a class="question-avatar" href="javascript:;">
            <img src="{{ $question->user->present()->avatar() }}"
                 alt="{{ $question->user->username }}"
                 class="img-circle img-responsive">
        </a>
    </div>
    <div class="col-md-9 col-sm-8">
        <h3>
            <a href="{{ route('questions.show', $question->id) }}">{!! $question->present()->isResolvedLabel() !!} {{ $question->title }}</a>
        </h3>
        <div>
            {!! $question->present()->categoriesLabels() !!}
        </div>
    </div>
    <div class="col-md-2 col-md-1 text-center">
        <small>{{ $question->present()->countAnswers() }} <br> Respostas</small>
    </div>
</div>