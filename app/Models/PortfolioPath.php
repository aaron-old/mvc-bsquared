<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioPath extends Model {

    /**
     * Generated
     */

    protected $table = 'portfolio_paths';
    protected $fillable = ['path_id', 'user_id', 'path', 'destination_id'];


    public function filePathLookup() {
        return $this->belongsTo('App\Models\FilePathLookup', 'destination_id', 'destination_id');
    }

    public function portfolioMember() {
        return $this->belongsTo('App\Models\PortfolioMember', 'user_id', 'user_id');
    }


}
