<?php

namespace App\Models\Masters;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MasterGenders
 * @package App\Models\Masters
 * @version November 22, 2020, 7:55 am UTC
 *
 * @property string $name
 */
class MasterGenders extends Model
{

    use HasFactory;

    public $table = 'master_genders';
    
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
        'name' => 'nullable|string|max:255'
    ];

    
}
