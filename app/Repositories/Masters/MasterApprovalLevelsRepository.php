<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterApprovalLevels;
use App\Repositories\BaseRepository;

/**
 * Class MasterApprovalLevelsRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 7:52 am UTC
*/

class MasterApprovalLevelsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'approval_level_group_id',
        'sequence'
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
        return MasterApprovalLevels::class;
    }
}
