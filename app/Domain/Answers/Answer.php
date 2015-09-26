<?php

namespace Artesaos\Domain\Answers;

use Illuminate\Database\Eloquent\Model;
use Artesaos\Domain\Users\User;
use Artesaos\Domain\Questions\Question;

class Answer extends Model
{
    protected $table = 'answers';

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
    public function question()
    {
        return $this->hasMany(Question::class);
    }
}