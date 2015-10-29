<?php

namespace Artesaos\Domain\Answers;

use Artesaos\Domain\Answers\Contracts\AnswerRepository as AnswerRepositoryContact;
use Artesaos\Core\Repositories\CommonRepository;

class AnswerRepository extends CommonRepository implements AnswerRepositoryContact
{
    protected $modelClass = Answer::class;
}
