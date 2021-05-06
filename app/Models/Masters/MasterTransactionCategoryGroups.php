<?php

namespace App\Models\Masters;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MasterTransactionCategoryGroups
 * @package App\Models\Masters
 * @version November 22, 2020, 8:04 am UTC
 *
 * @property string $name
 * @property string $employee_group_id
 */
class MasterTransactionCategoryGroups extends Model
{

    use HasFactory;

    public $table = 'master_transaction_category_groups';
    
    public $timestamps = false;




    public $fillable = [
        'name',
        'employee_group_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'name' => 'string',
        'employee_group_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:255',
        'employee_group_id' => 'nullable|string|max:4'
    ];

    
}
