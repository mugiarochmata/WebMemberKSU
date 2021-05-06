<?php

namespace App\Models\Masters;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MasterMemberSequences
 * @package App\Models\Masters
 * @version November 22, 2020, 7:58 am UTC
 *
 * @property integer $seq
 */
class MasterMemberSequences extends Model
{

    use HasFactory;

    public $table = 'master_member_sequences';
    
    public $timestamps = false;




    public $fillable = [
        'seq'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'company_id' => 'string',
        'seq' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'seq' => 'nullable|integer'
    ];

    
}
