<?php

namespace Artesaos\Domain\Questions;

use Laracasts\Presenter\Presenter;

class QuestionPresenter extends Presenter
{
    /**
     * @return string
     */
    public function categoriesLabels()
    {
        $categories = $this->entity->categories;

        $html = [];

        foreach ($categories as $cat) {
            $html[] = "<a href='javascript:;' class='label label-default'>{$cat->name}</a>";
        }

        return implode(PHP_EOL, $html);
    }

    /**
     * @return string|void
     */
    public function isResolvedLabel()
    {
        if ($this->entity->is_resolved) {
            return "<i class='fa fa-check text-success'></i> <span class='sr-only'>[Resolvido]</span>";
        }

        return;
    }

    /**
     * @return string
     */
    public function statusClass()
    {
        return ($this->entity->is_resolved) ? 'resolved' : 'unresolved';
    }

    /**
     * @return int
     */
    public function countAnswers()
    {
        return $this->entity->answers()->count();
    }
}
