<?php namespace bsquared\Models;

use Illuminate\Database\Eloquent\Model;

class FilePathLookup extends Model {



    protected  $table = 'file_path_lookup';
    protected  $fillable = ['destination_id', 'destination'];


    public function portfolioMembers() {
        return $this->belongsToMany('bsquared\Models\PortfolioMember', 'portfolio_paths', 'destination_id', 'user_id');
    }

    public function portfolioPaths() {
        return $this->hasMany('bsquared\Models\PortfolioPath', 'destination_id', 'destination_id');
    }


}
