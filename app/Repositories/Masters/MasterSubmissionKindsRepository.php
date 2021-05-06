<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterSubmissionKinds;
use App\Repositories\BaseRepository;

/**
 * Class MasterSubmissionKindsRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 8:02 am UTC
*/

class MasterSubmissionKindsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'submission_kind_group_id'
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
        return MasterSubmissionKinds::class;
    }
}
