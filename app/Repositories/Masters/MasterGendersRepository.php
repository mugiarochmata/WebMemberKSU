<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterGenders;
use App\Repositories\BaseRepository;

/**
 * Class MasterGendersRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 7:55 am UTC
*/

class MasterGendersRepository extends BaseRepository
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
        return MasterGenders::class;
    }
}
