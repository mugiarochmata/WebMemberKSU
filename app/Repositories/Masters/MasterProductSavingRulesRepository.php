<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterProductSavingRules;
use App\Repositories\BaseRepository;

/**
 * Class MasterProductSavingRulesRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 8:00 am UTC
*/

class MasterProductSavingRulesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_saving_id',
        'min_saving_amount',
        'max_saving_amount',
        'interest_rate',
        'repayment_source_id'
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
        return MasterProductSavingRules::class;
    }
}
