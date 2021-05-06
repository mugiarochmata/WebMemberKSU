<?php

namespace App\Models\Masters;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MasterApprovalLevels
 * @package App\Models\Masters
 * @version November 22, 2020, 7:52 am UTC
 *
 * @property string $name
 * @property string $approval_level_group_id
 * @property integer $sequence
 */
class MasterApprovalLevels extends Model
{

    use HasFactory;

    public $table = 'master_approval_levels';
    
    public $timestamps = false;




    public $fillable = [
        'name',
        'approval_level_group_id',
        'sequence'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'name' => 'string',
        'approval_level_group_id' => 'string',
        'sequence' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:30',
        'approval_level_group_id' => 'nullable|string|max:5',
        'sequence' => 'nullable|integer'
    ];

    
}
