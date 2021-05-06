<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterTransactionCategoryGroups;
use App\Repositories\BaseRepository;

/**
 * Class MasterTransactionCategoryGroupsRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 8:04 am UTC
*/

class MasterTransactionCategoryGroupsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'employee_group_id'
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
        return MasterTransactionCategoryGroups::class;
    }
}
