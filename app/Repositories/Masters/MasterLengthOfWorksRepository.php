<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterLengthOfWorks;
use App\Repositories\BaseRepository;

/**
 * Class MasterLengthOfWorksRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 7:56 am UTC
*/

class MasterLengthOfWorksRepository extends BaseRepository
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
        return MasterLengthOfWorks::class;
    }
}
