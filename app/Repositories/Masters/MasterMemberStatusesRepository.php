<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterMemberStatuses;
use App\Repositories\BaseRepository;

/**
 * Class MasterMemberStatusesRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 7:58 am UTC
*/

class MasterMemberStatusesRepository extends BaseRepository
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
        return MasterMemberStatuses::class;
    }
}
