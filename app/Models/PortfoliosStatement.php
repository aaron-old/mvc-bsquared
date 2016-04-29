<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfoliosStatement extends Model {

    /**
     * Generated
     */

    protected $table = 'portfolios_statement';
    protected $fillable = ['user_id', 'statement'];


    public function portfolioMember() {
        return $this->belongsTo('App\Models\PortfolioMember', 'user_id', 'user_id');
    }


}
