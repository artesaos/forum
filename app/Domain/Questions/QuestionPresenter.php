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
            return;
        }

        return "<span class='label label-success'>RESOLVIDO</span>";
    }
}
