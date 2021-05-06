<?php

namespace App\Models\Masters;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MasterGlobalParameters
 * @package App\Models\Masters
 * @version November 22, 2020, 7:55 am UTC
 *
 * @property string $param_name
 * @property string $param_value
 */
class MasterGlobalParameters extends Model
{

    use HasFactory;

    public $table = 'master_global_parameters';
    
    public $timestamps = false;




    public $fillable = [
        'param_name',
        'param_value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'param_name' => 'string',
        'param_value' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'param_name' => 'nullable|string|max:100',
        'param_value' => 'nullable|string|max:200'
    ];

    
}
