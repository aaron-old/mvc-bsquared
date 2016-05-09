<?php namespace Bsquared;

use Illuminate\Database\Eloquent\Model;

class PortfolioLabel extends Model {

    /**
     * Generated
     */

    protected $table = 'portfolio_labels';
    protected $fillable = ['label_id', 'user_id', 'label', 'destination_id'];


    public function portfolioMember() {
        return $this->belongsTo('Bsquared\PortfolioMember', 'user_id', 'user_id');
    }


}
