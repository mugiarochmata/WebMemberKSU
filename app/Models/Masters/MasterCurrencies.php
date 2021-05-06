<?php

namespace App\Models\Masters;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MasterCurrencies
 * @package App\Models\Masters
 * @version November 22, 2020, 7:54 am UTC
 *
 * @property string $name
 */
class MasterCurrencies extends Model
{

    use HasFactory;

    public $table = 'master_currencies';
    
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
        'name' => 'nullable|string|max:200'
    ];

    
}
