<?php namespace bsquared;

use Illuminate\Database\Eloquent\Model;

class PortfolioWork extends Model {

    /**
     * Generated
     */

    protected $table = 'portfolio_works';
    protected $fillable = ['user_id', 'works_id', 'title', 'project_description', 'work_link'];


    public function portfolioMember() {
        return $this->belongsTo('bsquared\PortfolioMember', 'user_id', 'user_id');
    }


}
