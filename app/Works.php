<?php namespace Bsquared;

use Illuminate\Database\Eloquent\Model;

class Works extends Model {
	
	protected $table = 'portfolio_works';
	protected $fillable = ['user_id', 'destination_id', 'title', 'project_description', 'work_link'];
    protected $primaryKey = 'works_id';


    public function User() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
