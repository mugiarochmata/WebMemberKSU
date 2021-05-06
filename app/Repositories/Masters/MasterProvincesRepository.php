<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterProvinces;
use App\Repositories\BaseRepository;

/**
 * Class MasterProvincesRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 8:01 am UTC
*/

class MasterProvincesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return MasterProvinces::class;
    }
}
