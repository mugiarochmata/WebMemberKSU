<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterMemberSections;
use App\Repositories\BaseRepository;

/**
 * Class MasterMemberSectionsRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 7:57 am UTC
*/

class MasterMemberSectionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'member_group_id'
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
        return MasterMemberSections::class;
    }
}
