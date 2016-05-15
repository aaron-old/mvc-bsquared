<?php 

namespace Bsquared;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

    /**
     * Generated
     */

    protected $table = 'portfolio_profiles';
    protected $fillable = ['user_id', 'firstName', 'lastName', 'aboutMe'];
    protected $primaryKey = 'user_id';


    public function User() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
