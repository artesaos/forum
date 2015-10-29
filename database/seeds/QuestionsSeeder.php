<?php

use Illuminate\Database\Seeder;
use Artesaos\Domain\Questions\Question;
use Artesaos\Domain\Answers\Answer;
use Artesaos\Domain\Users\User;
use Artesaos\Domain\Categories\Category;

class QuestionsSeeder extends Seeder
{
    protected $users;
    protected $categories;

    public function __construct()
    {
        Answer::truncate();
        Question::truncate();

        $this->users = User::all(['id'])->lists('id');
        $this->categories = Category::all(['id'])->lists('id');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Question::class, mt_rand(50, 80))
            ->make()
            ->each(function (Question $question) {
                $question->user_id = $this->getUserId();

                $question->save();

                $question->categories()->sync($this->getCategories());

                $this->makeAnswers($question);
            });
    }

    protected function makeAnswers(Question $question)
    {
        factory(Answer::class, mt_rand(2, 7))
            ->make(['question_id' => $question->id])
            ->each(function (Answer $answer) {
                $answer->user_id = $this->getUserId();
                $answer->save();
            });
    }

    /**
     * @return int
     */
    protected function getUserId()
    {
        return $this->users->random();
    }

    /**
     * @return array
     */
    protected function getCategories()
    {
        return $this->categories->random(mt_rand(2, 6))->toArray();
    }
}
