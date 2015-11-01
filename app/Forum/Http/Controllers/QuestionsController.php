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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->seo()->setTitle('Perguntas');

        $questions = $this->questions->getAll();
        $questions->load(['user', 'categories']);

        return $this->view('questions.index', compact('questions'));
    }

    /**
     * @param $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $question = $this->questions->findByID($id);
        $question->load(['answers', 'user', 'categories']);

        return $this->view('questions.show', compact('question'));
    }
}
