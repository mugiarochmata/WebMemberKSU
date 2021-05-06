<?php

namespace App\Models\Masters;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MasterSubmissionValidationRules
 * @package App\Models\Masters
 * @version November 22, 2020, 8:03 am UTC
 *
 * @property string $submission_kind_group_id
 * @property string $submission_validation_parameter_id
 * @property string $valid_value
 * @property integer $is_active
 */
class MasterSubmissionValidationRules extends Model
{

    use HasFactory;

    public $table = 'master_submission_validation_rules';
    
    public $timestamps = false;




    public $fillable = [
        'submission_kind_group_id',
        'submission_validation_parameter_id',
        'valid_value',
        'is_active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'submission_kind_group_id' => 'string',
        'submission_validation_parameter_id' => 'string',
        'valid_value' => 'string',
        'is_active' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'submission_kind_group_id' => 'nullable|string|max:5',
        'submission_validation_parameter_id' => 'nullable|string|max:6',
        'valid_value' => 'nullable|string|max:30',
        'is_active' => 'nullable|integer'
    ];

    
}
