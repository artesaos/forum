<?php

namespace Artesaos\Domain\Questions;

use Artesaos\Domain\Answers\Contracts\AnswerRepository as AnswerRepositoryContact;
use Artesaos\Core\Repositories\CommonRepository;

class QuestionRepository extends CommonRepository implements AnswerRepositoryContact
{
    protected $modelClass = Question::class;
}