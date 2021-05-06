<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterMemberPositions;
use App\Repositories\BaseRepository;

/**
 * Class MasterMemberPositionsRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 7:57 am UTC
*/

class MasterMemberPositionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'approval_level_id',
        'update_date'
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
        return MasterMemberPositions::class;
    }
}
