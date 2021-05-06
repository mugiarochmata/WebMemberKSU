<?php

namespace App\Models\Masters;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MasterProductSavingRules
 * @package App\Models\Masters
 * @version November 22, 2020, 8:00 am UTC
 *
 * @property string $product_saving_id
 * @property number $min_saving_amount
 * @property number $max_saving_amount
 * @property number $interest_rate
 * @property string $repayment_source_id
 */
class MasterProductSavingRules extends Model
{

    use HasFactory;

    public $table = 'master_product_saving_rules';
    
    public $timestamps = false;




    public $fillable = [
        'product_saving_id',
        'min_saving_amount',
        'max_saving_amount',
        'interest_rate',
        'repayment_source_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_saving_id' => 'string',
        'min_saving_amount' => 'decimal:2',
        'max_saving_amount' => 'decimal:2',
        'interest_rate' => 'decimal:2',
        'repayment_source_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_saving_id' => 'nullable|string|max:5',
        'min_saving_amount' => 'nullable|numeric',
        'max_saving_amount' => 'nullable|numeric',
        'interest_rate' => 'nullable|numeric',
        'repayment_source_id' => 'nullable|string|max:2'
    ];

    
}
