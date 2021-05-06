<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterProductLoanRules;
use App\Repositories\BaseRepository;

/**
 * Class MasterProductLoanRulesRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 8:00 am UTC
*/

class MasterProductLoanRulesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_id',
        'product_loan_kind_id',
        'min_plafond',
        'max_plafond',
        'min_tenor',
        'max_tenor',
        'interest_rate',
        'provision_fee',
        'provision_fee_unit_id',
        'administration_fee',
        'administration_fee_unit_id',
        'loan_processing_type_id',
        'interest_type_id',
        'is_extendable',
        'extendable_after',
        'is_active'
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
        return MasterProductLoanRules::class;
    }
}
