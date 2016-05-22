<?php namespace Bsquared;

use Illuminate\Database\Eloquent\Model;

class About extends Model {

	protected $table = 'portfolio_about';
	protected $fillable = ['user_id', 'overview'];
    protected $primaryKey = 'user_id';
    
    public function User() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
