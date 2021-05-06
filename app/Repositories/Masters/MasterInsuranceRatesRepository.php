<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterInsuranceRates;
use App\Repositories\BaseRepository;

/**
 * Class MasterInsuranceRatesRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 7:56 am UTC
*/

class MasterInsuranceRatesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'age',
        'jw',
        'rate'
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
        return MasterInsuranceRates::class;
    }
}
