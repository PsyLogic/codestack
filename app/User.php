<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function questions(){
        return $this->hasMany(Question::class);
    }
    
    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public function favorites(){
        return $this->belongsToMany(Question::class, 'favorites')->withTimestamps();
    }

    public function Qvotes(){
        return $this->morphedByMany(Question::class,'votable');
    }

    public function Avotes(){
        return $this->morphedByMany(Answer::class,'votable');
    }

    public function getUrlAttribute(){
        return '#';
    }

    public function getAvatarAttribute(){
        return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->email ) ) ) . "?s=36";
    }

    public function vote($model, $value = 1){
        $relationship = null;
        if($model instanceof Question)
            $relationship = $this->Qvotes();
        else if($model instanceof Answer)
            $relationship = $this->Avotes();
        
            
        $relationship->syncWithoutDetaching([$model->id => ['vote' => $value]]);

        $model->votes_count = $model->countTotalVoters();
        $model->save();
    }
}
