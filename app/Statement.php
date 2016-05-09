<?php 

namespace Bsquared;

use Illuminate\Database\Eloquent\Model;

class PortfoliosStatement extends Model {

    /**
     * Generated
     */

    protected $table = 'statement';
    protected $fillable = ['user_id', 'statement'];


    public function portfolioMember() {
        return $this->belongsTo('Bsquared\PortfolioMember', 'user_id', 'user_id');
    }


}
