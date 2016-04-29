<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilePathLookup extends Model {

    /**
     * Generated
     */

    protected $table = 'file_path_lookup';
    protected $fillable = ['destination_id', 'destination'];


    public function portfolioMembers() {
        return $this->belongsToMany('App\Models\PortfolioMember', 'portfolio_paths', 'destination_id', 'user_id');
    }

    public function portfolioPaths() {
        return $this->hasMany('App\Models\PortfolioPath', 'destination_id', 'destination_id');
    }


}
