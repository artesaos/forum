<?php

namespace Artesaos\Domain\Questions;

use Illuminate\Database\Eloquent\Model;
use Artesaos\Domain\Users\User;
use Artesaos\Domain\Answers\Answer;
use Artesaos\Domain\Categories\Category;

class Question extends Model
{
    protected $table = 'questions';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answer()
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}