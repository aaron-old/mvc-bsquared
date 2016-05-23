<?php namespace Bsquared;

use Illuminate\Database\Eloquent\Model;

class Label extends Model {

    /**
     * Generated
     */

    protected $table = 'portfolio_labels';
    protected $fillable = ['user_id', 'label', 'destination_id'];
    protected $primaryKey = 'label_id';


    public function User() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }


}
