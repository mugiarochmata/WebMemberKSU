<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterCompanies;
use App\Repositories\BaseRepository;

/**
 * Class MasterCompaniesRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 7:54 am UTC
*/

class MasterCompaniesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'economic_sector_id'
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
        return MasterCompanies::class;
    }
}
