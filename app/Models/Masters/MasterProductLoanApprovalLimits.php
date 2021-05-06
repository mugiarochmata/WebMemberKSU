<?php

namespace App\Models\Masters;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MasterProductLoanApprovalLimits
 * @package App\Models\Masters
 * @version November 22, 2020, 7:59 am UTC
 *
 * @property string $approval_level_id
 * @property string $product_id
 * @property string $product_kind_id
 * @property number $low_limit_amount
 * @property number $high_limit_amount
 * @property number $maximum_amount
 * @property integer $sequence
 */
class MasterProductLoanApprovalLimits extends Model
{

    use HasFactory;

    public $table = 'master_product_loan_approval_limits';
    
    public $timestamps = false;




    public $fillable = [
        'approval_level_id',
        'product_id',
        'product_kind_id',
        'low_limit_amount',
        'high_limit_amount',
        'maximum_amount',
        'sequence'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'approval_level_id' => 'string',
        'product_id' => 'string',
        'product_kind_id' => 'string',
        'low_limit_amount' => 'decimal:2',
        'high_limit_amount' => 'decimal:2',
        'maximum_amount' => 'decimal:2',
        'sequence' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'approval_level_id' => 'nullable|string|max:4',
        'product_id' => 'nullable|string|max:5',
        'product_kind_id' => 'nullable|string|max:6',
        'low_limit_amount' => 'nullable|numeric',
        'high_limit_amount' => 'nullable|numeric',
        'maximum_amount' => 'nullable|numeric',
        'sequence' => 'nullable|integer'
    ];

    
}
