<?php 

namespace Bsquared;

use Illuminate\Database\Eloquent\Model;

class Statement extends Model {

    /**
     * Generated
     */

    protected $table = 'portfolio_statement';
    protected $fillable = ['user_id', 'statement'];
    protected $primaryKey = 'user_id';


    public function User() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }


}
