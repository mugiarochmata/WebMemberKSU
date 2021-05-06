<?php

namespace App\Models\Masters;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MasterSubmissionStatuses
 * @package App\Models\Masters
 * @version November 22, 2020, 8:02 am UTC
 *
 * @property string $name
 */
class MasterSubmissionStatuses extends Model
{

    use HasFactory;

    public $table = 'master_submission_status';
    
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
        'name' => 'nullable|string|max:150'
    ];

    
}
