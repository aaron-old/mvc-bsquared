<?php namespace Bsquared;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PortfolioMember extends Model  {

    
    protected $table = 'portfolio_members';
    protected $fillable = ['user_id', 'username', 'email', 'password', 'remember_token', 'role'];
    protected $primaryKey = 'user_id';
    
    public function filePathLookups() {
        return $this->belongsToMany('Bsquared\FilePathLookup', 'portfolio_paths', 'user_id', 'destination_id');
    }

    public function portfolioColumns() {
        return $this->hasMany('Bsquared\PortfolioColumn', 'user_id', 'user_id');
    }

    public function portfolioLabels() {
        return $this->hasMany('Bsquared\PortfolioLabel', 'user_id', 'user_id');
    }

    public function portfolioPaths() {
        return $this->hasMany('Bsquared\PortfolioPath', 'user_id', 'user_id');
    }

    public function portfolioWorks() {
        return $this->hasMany('Bsquared\PortfolioWork', 'user_id', 'user_id');
    }

    public function loginAttempt() {
        return $this->hasOne('Bsquared\LoginAttempt', 'user_id', 'user_id');
    }

    public function portfolioProfile() {
        return $this->hasOne('Bsquared\PortfolioProfile', 'user_id', 'user_id');
    }

    public function portfoliosAbout() {
        return $this->hasOne('Bsquared\PortfoliosAbout', 'user_id', 'user_id');
    }

    public function portfoliosStatement() {
        return $this->hasOne('Bsquared\PortfoliosStatement', 'user_id', 'user_id');
    }


}
