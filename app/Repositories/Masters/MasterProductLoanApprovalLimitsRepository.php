<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterProductLoanApprovalLimits;
use App\Repositories\BaseRepository;

/**
 * Class MasterProductLoanApprovalLimitsRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 7:59 am UTC
*/

class MasterProductLoanApprovalLimitsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'approval_level_id',
        'product_id',
        'product_kind_id',
        'low_limit_amount',
        'high_limit_amount',
        'maximum_amount',
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
        return MasterProductLoanApprovalLimits::class;
    }
}
