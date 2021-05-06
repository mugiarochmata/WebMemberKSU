<?php

namespace App\Models\Masters;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MasterMemberSections
 * @package App\Models\Masters
 * @version November 22, 2020, 7:57 am UTC
 *
 * @property string $name
 * @property string $member_group_id
 */
class MasterMemberSections extends Model
{

    use HasFactory;

    public $table = 'master_member_sections';
    
    public $timestamps = false;




    public $fillable = [
        'name',
        'member_group_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'name' => 'string',
        'member_group_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:255',
        'member_group_id' => 'nullable|string|max:4'
    ];

    
}
