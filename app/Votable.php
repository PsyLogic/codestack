<?php

namespace App;

/**
 * Votable System
 */
trait Votable
{

    /**
     * Return the total vote score
     *
     * @return int
     */
    public function countTotalVoters()
    {
        $downVote = $this->countDownVoters();
        $upVotes = $this->countUpVoters();
        return (int) $upVotes + $downVote;
    }

    /**
     * Count the number of up votes.
     *
     * @return int
     */
    public function countUpVoters()
    {
        return (int) $this->countVoters();
    }
    /**
     * Count the number of down votes.
     *
     * @return int
     */
    public function countDownVoters()
    {
        return (int) $this->countVoters(-1);
    }

    /**
     * Count the number of voters.
     *
     * @param int $value
     *
     * @return int
     */
    public function countVoters($value = 1)
    {
        return (int) $this->votes()->wherePivot('vote', $value)->sum('vote');
    }

    /**
     * Return voters.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function votes(){
        return $this->morphToMany(User::class,'votable');
    }
}
