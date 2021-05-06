<?php

namespace App\Models\Masters;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MasterSubmissionKinds
 * @package App\Models\Masters
 * @version November 22, 2020, 8:02 am UTC
 *
 * @property string $name
 * @property string $submission_kind_group_id
 */
class MasterSubmissionKinds extends Model
{

    use HasFactory;

    public $table = 'master_submission_kinds';
    
    public $timestamps = false;




    public $fillable = [
        'name',
        'submission_kind_group_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'name' => 'string',
        'submission_kind_group_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:100',
        'submission_kind_group_id' => 'nullable|string|max:5'
    ];

    
}
