<?php

namespace App\Models\Masters;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MasterProductLoanRules
 * @package App\Models\Masters
 * @version November 22, 2020, 8:00 am UTC
 *
 * @property string $product_id
 * @property string $product_loan_kind_id
 * @property number $min_plafond
 * @property number $max_plafond
 * @property integer $min_tenor
 * @property integer $max_tenor
 * @property number $interest_rate
 * @property number $provision_fee
 * @property string $provision_fee_unit_id
 * @property number $administration_fee
 * @property string $administration_fee_unit_id
 * @property string $loan_processing_type_id
 * @property string $interest_type_id
 * @property string $is_extendable
 * @property integer $extendable_after
 * @property integer $is_active
 */
class MasterProductLoanRules extends Model
{

    use HasFactory;

    public $table = 'master_product_loan_rules';
    
    public $timestamps = false;




    public $fillable = [
        'product_id',
        'product_loan_kind_id',
        'min_plafond',
        ' .kl;.',
        'min_tenor',
        'max_tenor',
        'interest_rate',
        'provision_fee',
        'provision_fee_unit_id',
        'administration_fee',
        'administration_fee_unit_id',
        'loan_processing_type_id',
        'interest_type_id',
        'is_extendable',
        'extendable_after',
        'is_active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'string',
        'product_loan_kind_id' => 'string',
        'min_plafond' => 'decimal:2',
        'max_plafond' => 'decimal:2',
        'min_tenor' => 'integer',
        'max_tenor' => 'integer',
        'interest_rate' => 'decimal:2',
        'provision_fee' => 'decimal:2',
        'provision_fee_unit_id' => 'string',
        'administration_fee' => 'decimal:2',
        'administration_fee_unit_id' => 'string',
        'loan_processing_type_id' => 'string',
        'interest_type_id' => 'string',
        'is_extendable' => 'string',
        'extendable_after' => 'integer',
        'is_active' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_id' => 'nullable|string|max:5',
        'product_loan_kind_id' => 'nullable|string|max:6',
        'min_plafond' => 'nullable|numeric',
        'max_plafond' => 'nullable|numeric',
        'min_tenor' => 'nullable|integer',
        'max_tenor' => 'nullable|integer',
        'interest_rate' => 'nullable|numeric',
        'provision_fee' => 'nullable|numeric',
        'provision_fee_unit_id' => 'nullable|string|max:1',
        'administration_fee' => 'nullable|numeric',
        'administration_fee_unit_id' => 'nullable|string|max:1',
        'loan_processing_type_id' => 'nullable|string|max:1',
        'interest_type_id' => 'nullable|string|max:1',
        'is_extendable' => 'nullable|string|max:1',
        'extendable_after' => 'nullable|integer',
        'is_active' => 'nullable|integer'
    ];

    
}
