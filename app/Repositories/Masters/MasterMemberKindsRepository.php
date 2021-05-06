<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterMemberKinds;
use App\Repositories\BaseRepository;

/**
 * Class MasterMemberKindsRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 7:57 am UTC
*/

class MasterMemberKindsRepository extends BaseRepository
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
        return MasterMemberKinds::class;
    }
}
