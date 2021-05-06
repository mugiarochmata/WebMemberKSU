<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterOccupations;
use App\Repositories\BaseRepository;

/**
 * Class MasterOccupationsRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 7:59 am UTC
*/

class MasterOccupationsRepository extends BaseRepository
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
        return MasterOccupations::class;
    }
}
