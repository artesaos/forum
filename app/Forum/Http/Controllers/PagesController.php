<?php

namespace Artesaos\Forum\Http\Controllers;

use Artesaos\Domain\Questions\QuestionRepository;

class PagesController extends BaseController
{
    /**
     * @param QuestionRepository $repository
     *
     * @return \Illuminate\View\View
     */
    public function home(QuestionRepository $repository)
    {
        $this->seo()->setTitle('HOME');

        $questions = $repository->getAll();
        $questions->load(['user', 'categories']);

        return $this->view('pages.home', compact('questions'));
    }
}