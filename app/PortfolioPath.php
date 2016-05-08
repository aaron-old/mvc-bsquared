<?php namespace bsquared;

use Illuminate\Database\Eloquent\Model;

class PortfolioPath extends Model {

    /**
     * Generated
     */

    protected $table = 'portfolio_paths';
    protected $fillable = ['path_id', 'user_id', 'path', 'destination_id'];


    public function filePathLookup() {
        return $this->belongsTo('bsquared\FilePathLookup', 'destination_id', 'destination_id');
    }

    public function portfolioMember() {
        return $this->belongsTo('bsquared\PortfolioMember', 'user_id', 'user_id');
    }


}
