<?php

namespace App\Models\Masters;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MasterCompanies
 * @package App\Models\Masters
 * @version November 22, 2020, 7:54 am UTC
 *
 * @property string $name
 * @property string $economic_sector_id
 */
class MasterCompanies extends Model
{

    use HasFactory;

    public $table = 'master_companies';
    
    public $timestamps = false;




    public $fillable = [
        'name',
        'economic_sector_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'name' => 'string',
        'economic_sector_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:200',
        'economic_sector_id' => 'nullable|string|max:6'
    ];

    
}
