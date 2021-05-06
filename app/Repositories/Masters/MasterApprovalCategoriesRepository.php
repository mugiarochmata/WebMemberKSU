<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterApprovalCategories;
use App\Repositories\BaseRepository;

/**
 * Class MasterApprovalCategoriesRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 7:48 am UTC
*/

class MasterApprovalCategoriesRepository extends BaseRepository
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
        return MasterApprovalCategories::class;
    }
}
