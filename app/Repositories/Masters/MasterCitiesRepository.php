<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterCities;
use App\Repositories\BaseRepository;

/**
 * Class MasterCitiesRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 7:53 am UTC
*/

class MasterCitiesRepository extends BaseRepository
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
        return MasterCities::class;
    }
}
