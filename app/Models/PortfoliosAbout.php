<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfoliosAbout extends Model {

    /**
     * Generated
     */

    protected $table = 'portfolios_about';
    protected $fillable = ['user_id', 'overview'];


    public function portfolioMember() {
        return $this->belongsTo('App\Models\PortfolioMember', 'user_id', 'user_id');
    }


}