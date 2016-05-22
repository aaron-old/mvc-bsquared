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

    public function destination() {
        return $this->belongsToMany(Destination::class, 'portfolio_paths', 'user_id', 'destination_id');
    }

    public function columns() {
        return $this->hasMany(Column::class, 'user_id', 'user_id');
    }

    public function labels() {
        return $this->hasMany(Label::class, 'user_id', 'user_id');
    }

    public function paths() {
        return $this->hasMany(Path::class, 'user_id', 'user_id');
    }

    public function works() {
        return $this->hasMany(Works::class, 'user_id', 'user_id');
    }

    public function loginAttempt() {
        return $this->hasOne(LoginAttempt::class, 'user_id', 'user_id');
    }

    public function profile() {
        return $this->hasOne(Profile::class, 'user_id', 'user_id');
    }

    public function about() {
        return $this->hasOne(About::class, 'user_id', 'user_id');
    }

    public function statement() {
        return $this->hasOne(Statement::class, 'user_id', 'user_id');
    }

    public static function getUserPortfolio($userID) {
        $user =  User::find($userID);
        $user->profile;
        $user->about;
        $user->columns;
        $user->labels;
        $user->works;
        $user->paths;
        
        return $user;
    }
}
