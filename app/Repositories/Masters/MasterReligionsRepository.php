<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterReligions;
use App\Repositories\BaseRepository;

/**
 * Class MasterReligionsRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 8:01 am UTC
*/

class MasterReligionsRepository extends BaseRepository
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
        return MasterReligions::class;
    }
}
