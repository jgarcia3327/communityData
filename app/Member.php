<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $sector_president_id
 * @property int $encoder_id
 * @property string $fname
 * @property string $lname
 * @property string $mname
 * @property string $nname
 * @property string $mnumber
 * @property string $lnumber
 * @property string $dob
 * @property string $pob
 * @property string $create_date
 * @property string $modify_date
 */
class Member extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'sector_president_id', 'encoder_id', 'fname', 'lname', 'mname', 'nname', 'mnumber', 'lnumber', 'dob', 'pob', 'create_date', 'modify_date'];

}
