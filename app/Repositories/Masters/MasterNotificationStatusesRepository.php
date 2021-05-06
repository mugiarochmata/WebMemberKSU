<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterNotificationStatuses;
use App\Repositories\BaseRepository;

/**
 * Class MasterNotificationStatusesRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 7:59 am UTC
*/

class MasterNotificationStatusesRepository extends BaseRepository
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
        return MasterNotificationStatuses::class;
    }
}
