<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property boolean $type
 * @property string $house_street
 * @property string $sitio
 * @property string $zip
 * @property string $create_date
 * @property string $modify_date
 */
class Address extends Model
{

    public $timestamps = false;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'address';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'type', 'house_street', 'sitio', 'zip'];

}
