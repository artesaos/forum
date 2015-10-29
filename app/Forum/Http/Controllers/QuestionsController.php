<?php

namespace Artesaos\Forum\Http\Controllers;

use Artesaos\Domain\Questions\Contracts\QuestionRepository;

class QuestionsController extends BaseController
{
    /**
     * @var QuestionRepository
     */
    private $questions;

    public function __construct(QuestionRepository $questions)
    {
        $this->questions = $questions;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return $this->questions->getAll();
    }

    public function show($id)
    {
        $question = $this->questions->findByID($id);
        $question->load(['answer', 'user', 'categories']);

        return $this->view('questions.show', compact('question'));
    }
}
