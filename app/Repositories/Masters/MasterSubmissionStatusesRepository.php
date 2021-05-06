<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterSubmissionStatuses;
use App\Repositories\BaseRepository;

/**
 * Class MasterSubmissionStatusesRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 8:02 am UTC
*/

class MasterSubmissionStatusesRepository extends BaseRepository
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
        return MasterSubmissionStatuses::class;
    }
}
