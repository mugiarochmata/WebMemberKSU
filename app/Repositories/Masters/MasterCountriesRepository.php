<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterCountries;
use App\Repositories\BaseRepository;

/**
 * Class MasterCountriesRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 7:54 am UTC
*/

class MasterCountriesRepository extends BaseRepository
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
        return MasterCountries::class;
    }
}
