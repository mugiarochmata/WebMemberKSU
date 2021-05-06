<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterCurrencies;
use App\Repositories\BaseRepository;

/**
 * Class MasterCurrenciesRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 7:54 am UTC
*/

class MasterCurrenciesRepository extends BaseRepository
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
        return MasterCurrencies::class;
    }
}
