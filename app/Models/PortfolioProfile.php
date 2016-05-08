<?php namespace bsquared\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioProfile extends Model {

    /**
     * Generated
     */

    protected $table = 'portfolio_profiles';
    protected $fillable = ['user_id', 'firstName', 'lastName', 'aboutMe'];


    public function portfolioMember() {
        return $this->belongsTo('bsquared\Models\PortfolioMember', 'user_id', 'user_id');
    }


}
