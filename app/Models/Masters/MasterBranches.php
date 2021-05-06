<?php

namespace App\Models\Masters;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MasterBranches
 * @package App\Models\Masters
 * @version November 22, 2020, 7:53 am UTC
 *
 * @property string $company_id
 * @property string $name
 * @property string $address
 * @property string $phone_number
 * @property string $fax_number
 * @property string $city
 * @property string $province
 */
class MasterBranches extends Model
{

    use HasFactory;

    public $table = 'master_branches';
    
    public $timestamps = false;




    public $fillable = [
        'company_id',
        'name',
        'address',
        'phone_number',
        'fax_number',
        'city',
        'province'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'company_id' => 'string',
        'name' => 'string',
        'address' => 'string',
        'phone_number' => 'string',
        'fax_number' => 'string',
        'city' => 'string',
        'province' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'company_id' => 'required|string|max:3',
        'name' => 'nullable|string|max:200',
        'address' => 'nullable|string|max:200',
        'phone_number' => 'nullable|string|max:30',
        'fax_number' => 'nullable|string|max:30',
        'city' => 'nullable|string|max:200',
        'province' => 'nullable|string|max:200'
    ];

    
}
