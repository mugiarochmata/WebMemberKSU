<?php

namespace App\Models\Masters;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MasterSubmissionValidationStatuses
 * @package App\Models\Masters
 * @version November 22, 2020, 8:03 am UTC
 *
 * @property string $name
 */
class MasterSubmissionValidationStatuses extends Model
{

    use HasFactory;

    public $table = 'master_submission_validation_status';
    
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
