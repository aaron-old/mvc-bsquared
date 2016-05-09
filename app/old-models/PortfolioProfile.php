<?php namespace Bsquared;

use Illuminate\Database\Eloquent\Model;

class PortfolioProfile extends Model {

    /**
     * Generated
     */

    protected $table = 'portfolio_profiles';
    protected $fillable = ['user_id', 'firstName', 'lastName', 'aboutMe'];
    protected $primaryKey = 'user_id';


    public function portfolioMember() {
        return $this->belongsTo(PortfolioProfile::class, 'user_id', 'user_id');
    }
}
