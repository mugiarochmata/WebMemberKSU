<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterLengthOfStays;
use App\Repositories\BaseRepository;

/**
 * Class MasterLengthOfStaysRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 7:56 am UTC
*/

class MasterLengthOfStaysRepository extends BaseRepository
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
        return MasterLengthOfStays::class;
    }
}
