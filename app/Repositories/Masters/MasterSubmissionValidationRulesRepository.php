<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterSubmissionValidationRules;
use App\Repositories\BaseRepository;

/**
 * Class MasterSubmissionValidationRulesRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 8:03 am UTC
*/

class MasterSubmissionValidationRulesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'submission_kind_group_id',
        'submission_validation_parameter_id',
        'valid_value',
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
        return MasterSubmissionValidationRules::class;
    }
}
