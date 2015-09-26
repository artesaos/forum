<?php

namespace Artesaos\Domain\Questions;

use Artesaos\Domain\Questions\Contracts\QuestionRepository as QuestionRepositoryContract;
use Artesaos\Core\Repositories\CommonRepository;

class QuestionRepository extends CommonRepository implements QuestionRepositoryContract
{
    protected $modelClass = Question::class;
}