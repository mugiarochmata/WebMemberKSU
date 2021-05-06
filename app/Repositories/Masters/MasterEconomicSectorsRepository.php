<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterEconomicSectors;
use App\Repositories\BaseRepository;

/**
 * Class MasterEconomicSectorsRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 7:54 am UTC
*/

class MasterEconomicSectorsRepository extends BaseRepository
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
        return MasterEconomicSectors::class;
    }
}
