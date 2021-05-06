<?php

namespace App\Models\Masters;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MasterInsuranceRates
 * @package App\Models\Masters
 * @version November 22, 2020, 7:56 am UTC
 *
 * @property integer $age
 * @property integer $jw
 * @property number $rate
 */
class MasterInsuranceRates extends Model
{

    use HasFactory;

    public $table = 'master_insurance_rates';
    
    public $timestamps = false;




    public $fillable = [
        'age',
        'jw',
        'rate'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'age' => 'integer',
        'jw' => 'integer',
        'rate' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'age' => 'nullable|integer',
        'jw' => 'nullable|integer',
        'rate' => 'nullable|numeric'
    ];

    
}
