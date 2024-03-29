<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    use Votable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['body', 'user_id'];
    
    public static function boot(){
        parent::boot();

        static::created(function($answer){
            $answer->question->increment('answers_count');
        });
        static::deleted(function($answer){
            $answer->question->decrement('answers_count');
        });
    }
    
    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }

    public function getCreateDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute()
    {
        return $this->is_best ? 'best-answer' : '';
    }

    public function getIsBestAttribute()
    {
        return $this->id === $this->question->best_answer_id;
    }
}
