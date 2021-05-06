<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterTransactionCategories;
use App\Repositories\BaseRepository;

/**
 * Class MasterTransactionCategoriesRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 8:04 am UTC
*/

class MasterTransactionCategoriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'transaction_category_group_id'
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
        return MasterTransactionCategories::class;
    }
}
