<?php namespace bsquared;

use Illuminate\Database\Eloquent\Model;

class PortfolioColumn extends Model {

    /**
     * Generated
     */

    protected $table = 'portfolio_columns';
    protected $fillable = ['column_id', 'user_id', 'column_text', 'destination_id'];


    public function portfolioMember() {
        return $this->belongsTo('bsquared\PortfolioMember', 'user_id', 'user_id');
    }


}
