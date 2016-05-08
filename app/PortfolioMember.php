<?php namespace bsquared;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PortfolioMember extends Model  {

    
    protected $table = 'portfolio_members';
    protected $fillable = ['user_id', 'username', 'email', 'password', 'remember_token', 'role'];
    protected $primaryKey = 'user_id';
    
    public function filePathLookups() {
        return $this->belongsToMany('bsquared\FilePathLookup', 'portfolio_paths', 'user_id', 'destination_id');
    }

    public function portfolioColumns() {
        return $this->hasMany('bsquared\PortfolioColumn', 'user_id', 'user_id');
    }

    public function portfolioLabels() {
        return $this->hasMany('bsquared\PortfolioLabel', 'user_id', 'user_id');
    }

    public function portfolioPaths() {
        return $this->hasMany('bsquared\PortfolioPath', 'user_id', 'user_id');
    }

    public function portfolioWorks() {
        return $this->hasMany('bsquared\PortfolioWork', 'user_id', 'user_id');
    }

    public function loginAttempt() {
        return $this->hasOne('bsquared\LoginAttempt', 'user_id', 'user_id');
    }

    public function portfolioProfile() {
        return $this->hasOne('bsquared\PortfolioProfile', 'user_id', 'user_id');
    }

    public function portfoliosAbout() {
        return $this->hasOne('bsquared\PortfoliosAbout', 'user_id', 'user_id');
    }

    public function portfoliosStatement() {
        return $this->hasOne('bsquared\PortfoliosStatement', 'user_id', 'user_id');
    }


}
