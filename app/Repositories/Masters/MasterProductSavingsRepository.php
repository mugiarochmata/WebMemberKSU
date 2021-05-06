<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterProductSavings;
use App\Repositories\BaseRepository;

/**
 * Class MasterProductSavingsRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 8:00 am UTC
*/

class MasterProductSavingsRepository extends BaseRepository
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
        return MasterProductSavings::class;
    }
}
