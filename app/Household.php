<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $num_earners
 * @property float $total_income_month
 * @property boolean $nature_occupancy
 * @property string $create_date
 * @property string $modify_date
 */
class Household extends Model
{

    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'num_earners', 'total_income_month', 'nature_occupancy'];

}
