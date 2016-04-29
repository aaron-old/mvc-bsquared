<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioMember extends Model {

    /**
     * Generated
     */

    protected $table = 'portfolio_members';
    protected $fillable = ['user_id', 'username', 'email', 'password', 'remember_token', 'role'];


    public function filePathLookups() {
        return $this->belongsToMany('App\Models\FilePathLookup', 'portfolio_paths', 'user_id', 'destination_id');
    }

    public function portfolioColumns() {
        return $this->hasMany('App\Models\PortfolioColumn', 'user_id', 'user_id');
    }

    public function portfolioLabels() {
        return $this->hasMany('App\Models\PortfolioLabel', 'user_id', 'user_id');
    }

    public function portfolioPaths() {
        return $this->hasMany('App\Models\PortfolioPath', 'user_id', 'user_id');
    }

    public function portfolioWorks() {
        return $this->hasMany('App\Models\PortfolioWork', 'user_id', 'user_id');
    }

    public function loginAttempt() {
        return $this->hasOne('App\Models\LoginAttempt', 'user_id', 'user_id');
    }

    public function portfolioProfile() {
        return $this->hasOne('App\Models\PortfolioProfile', 'user_id', 'user_id');
    }

    public function portfoliosAbout() {
        return $this->hasOne('App\Models\PortfoliosAbout', 'user_id', 'user_id');
    }

    public function portfoliosStatement() {
        return $this->hasOne('App\Models\PortfoliosStatement', 'user_id', 'user_id');
    }


}
