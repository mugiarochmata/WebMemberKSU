<?php

namespace App\Models\Masters;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MasterTransactionCategories
 * @package App\Models\Masters
 * @version November 22, 2020, 8:04 am UTC
 *
 * @property string $name
 * @property string $transaction_category_group_id
 */
class MasterTransactionCategories extends Model
{

    use HasFactory;

    public $table = 'master_transaction_categories';
    
    public $timestamps = false;




    public $fillable = [
        'name',
        'transaction_category_group_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'name' => 'string',
        'transaction_category_group_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:255',
        'transaction_category_group_id' => 'nullable|string|max:5'
    ];

    
}
