<?php namespace Bsquared;

use Illuminate\Database\Eloquent\Model;

class Column extends Model {

    
    protected $table = 'portfolio_columns';
    protected $fillable = ['user_id', 'column_text', 'destination_id'];
    protected $primaryKey = 'column_id';


    public function User() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }


}
