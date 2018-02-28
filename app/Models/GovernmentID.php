<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property boolean $is_pwd
 * @property string $pwd_disability
 * @property string $pwd_id
 * @property string $senior_id
 * @property boolean $solo_parent_id
 * @property boolean $is_voter
 * @property string $last_vote
 * @property string $create_date
 * @property string $modify_date
 */
class GovernmentID extends Model
{

    public $timestamps = false;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'government_ids';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'is_pwd', 'pwd_disability', 'pwd_id', 'senior_id', 'solo_parent_id', 'is_voter', 'last_vote'];

}
