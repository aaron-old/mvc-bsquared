<?php namespace Bsquared;

use Illuminate\Database\Eloquent\Model;

class PortfolioColumn extends Model {

    /**
     * Generated
     */

    protected $table = 'portfolio_columns';
    protected $fillable = ['column_id', 'user_id', 'column_text', 'destination_id'];


    public function portfolioMember() {
        return $this->belongsTo('Bsquared\PortfolioMember', 'user_id', 'user_id');
    }


}
