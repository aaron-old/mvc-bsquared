<?php

namespace Bsquared;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'role'
    ];

    protected $primaryKey = 'user_id';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function filePathLookups() {
        return $this->belongsToMany('Bsquared\FilePathLookup', 'portfolio_paths', 'user_id', 'destination_id');
    }

    public function portfolioColumns() {
        return $this->hasMany('Bsquared\Column', 'user_id', 'user_id');
    }

    public function portfolioLabels() {
        return $this->hasMany('Bsquared\Label', 'user_id', 'user_id');
    }

    public function portfolioPaths() {
        return $this->hasMany('Bsquared\Path', 'user_id', 'user_id');
    }

    public function portfolioWorks() {
        return $this->hasMany('Bsquared\Work', 'user_id', 'user_id');
    }

    public function loginAttempt() {
        return $this->hasOne('Bsquared\LoginAttempt', 'user_id', 'user_id');
    }

    public function portfolioProfile() {
        return $this->hasOne('Bsquared\Profile', 'user_id', 'user_id');
    }

    public function portfoliosAbout() {
        return $this->hasOne('Bsquared\About', 'user_id', 'user_id');
    }

    public function portfoliosStatement() {
        return $this->hasOne('Bsquared\Statement', 'user_id', 'user_id');
    }
}
