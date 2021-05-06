<?php

namespace App\Models\Masters;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MasterTaxOptions
 * @package App\Models\Masters
 * @version November 22, 2020, 8:03 am UTC
 *
 * @property string $name
 */
class MasterTaxOptions extends Model
{

    use HasFactory;

    public $table = 'master_tax_options';
    
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
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:50'
    ];

    
}
