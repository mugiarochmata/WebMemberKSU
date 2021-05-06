<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterSubmissionValidationStatuses;
use App\Repositories\BaseRepository;

/**
 * Class MasterSubmissionValidationStatusesRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 8:03 am UTC
*/

class MasterSubmissionValidationStatusesRepository extends BaseRepository
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
        return MasterSubmissionValidationStatuses::class;
    }
}
