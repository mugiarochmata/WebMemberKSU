<?php

namespace App\Models\Masters;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MasterRepaymentSources
 * @package App\Models\Masters
 * @version November 22, 2020, 8:01 am UTC
 *
 * @property string $name
 */
class MasterRepaymentSources extends Model
{

    use HasFactory;

    public $table = 'master_repayment_sources';
    
    public $timestamps = false;




    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:100'
    ];

    
}
