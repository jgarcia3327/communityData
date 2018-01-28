<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $sector
 * @property string $civil_status
 * @property int $num_children
 * @property int $num_dependents
 * @property string $religion
 * @property boolean $education
 * @property boolean $occupation
 * @property boolean $income
 * @property boolean $med_insurance
 * @property string $create_date
 * @property string $modify_date
 */
class Status extends Model
{
  
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'status';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'sector', 'civil_status', 'num_children', 'num_dependents', 'religion', 'education', 'occupation', 'income', 'med_insurance'];

}
