<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterTaxOptions;
use App\Repositories\BaseRepository;

/**
 * Class MasterTaxOptionsRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 8:03 am UTC
*/

class MasterTaxOptionsRepository extends BaseRepository
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
        return MasterTaxOptions::class;
    }
}
