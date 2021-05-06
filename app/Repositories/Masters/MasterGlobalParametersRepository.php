<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterGlobalParameters;
use App\Repositories\BaseRepository;

/**
 * Class MasterGlobalParametersRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 7:55 am UTC
*/

class MasterGlobalParametersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'param_name',
        'param_value'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MasterGlobalParameters::class;
    }
}
