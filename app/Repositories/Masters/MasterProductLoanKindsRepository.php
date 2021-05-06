<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterProductLoanKinds;
use App\Repositories\BaseRepository;

/**
 * Class MasterProductLoanKindsRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 8:00 am UTC
*/

class MasterProductLoanKindsRepository extends BaseRepository
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
        return MasterProductLoanKinds::class;
    }
}
