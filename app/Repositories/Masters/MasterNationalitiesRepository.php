<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterNationalities;
use App\Repositories\BaseRepository;

/**
 * Class MasterNationalitiesRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 7:58 am UTC
*/

class MasterNationalitiesRepository extends BaseRepository
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
        return MasterNationalities::class;
    }
}
