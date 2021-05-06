<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterEmployeeStatuses;
use App\Repositories\BaseRepository;

/**
 * Class MasterEmployeeStatusesRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 7:55 am UTC
*/

class MasterEmployeeStatusesRepository extends BaseRepository
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
        return MasterEmployeeStatuses::class;
    }
}
