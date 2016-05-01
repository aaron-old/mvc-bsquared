<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PortfolioProfile extends Model {

    /**
     * Generated
     */

    protected $table = 'portfolio_profiles';
    protected $fillable = ['user_id', 'firstName', 'lastName', 'aboutMe'];
    protected $primaryKey = 'user_id';


    public function portfolioMember() {
        return $this->belongsTo('App\Models\PortfolioMember', 'user_id', 'user_id');
    }


}
