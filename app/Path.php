<?php namespace Bsquared;

use Illuminate\Database\Eloquent\Model;

/**
 * @property  user_id
 */
class Path extends Model {

    /**
     * Generated
     */

    protected $table = 'user_portfolio_paths';
    protected $fillable = ['user_id', 'path', 'destination_id'];
    protected $primaryKey = 'path_id';


    public function filePathLookup() {
        return $this->belongsTo('Bsquared\Destination', 'destination_id', 'destination_id');
    }

    public function User() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }


}
