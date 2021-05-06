<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterLoanStatuses;
use App\Repositories\BaseRepository;

/**
 * Class MasterLoanStatusesRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 7:56 am UTC
*/

class MasterLoanStatusesRepository extends BaseRepository
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
        return MasterLoanStatuses::class;
    }
}
