<?php

namespace App\Models\Masters;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MasterMemberPositions
 * @package App\Models\Masters
 * @version November 22, 2020, 7:57 am UTC
 *
 * @property string $name
 * @property string $approval_level_id
 * @property string|\Carbon\Carbon $update_date
 */
class MasterMemberPositions extends Model
{

    use HasFactory;

    public $table = 'master_member_positions';
    
    public $timestamps = false;




    public $fillable = [
        'name',
        'approval_level_id',
        'update_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'name' => 'string',
        'approval_level_id' => 'string',
        'update_date' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:200',
        'approval_level_id' => 'nullable|string|max:4',
        'update_date' => 'nullable'
    ];

    
}
