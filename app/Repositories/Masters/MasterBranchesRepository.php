<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterBranches;
use App\Repositories\BaseRepository;

/**
 * Class MasterBranchesRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 7:53 am UTC
*/

class MasterBranchesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'company_id',
        'name',
        'address',
        'phone_number',
        'fax_number',
        'city',
        'province'
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
        return MasterBranches::class;
    }
}
