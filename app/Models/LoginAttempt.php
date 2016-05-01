<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginAttempt extends Model {

    /**
     * Generated
     */

    protected $table = 'login_attempts';
    protected $fillable = ['user_id'];


    public function portfolioMember() {
        return $this->belongsTo('App\Models\PortfolioMember', 'user_id', 'user_id');
    }


}
