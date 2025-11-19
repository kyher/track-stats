<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $appends = [
        'voteCount',
    ];

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function getVoteCountAttribute()
    {
        return $this->votes()->count();
    }
}
