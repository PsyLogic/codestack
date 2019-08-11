<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($title){
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = str_slug($title);
    }

    public function getUrlAttribute()
    {
        return route('questions.show', $this);
    }

    public function getCreateDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute()
    {
        if( $this->answers > 0 ){
            if($this->best_answer_id){
                return "answer-accepted";
            }
            return "answered";
        }
        return "unanswered";
    }
}
