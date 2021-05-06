<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterApprovalLevelGroups;
use App\Repositories\BaseRepository;

/**
 * Class MasterApprovalLevelGroupsRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 7:52 am UTC
*/

class MasterApprovalLevelGroupsRepository extends BaseRepository
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
        return MasterApprovalLevelGroups::class;
    }
}
