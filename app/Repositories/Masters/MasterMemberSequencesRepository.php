<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterMemberSequences;
use App\Repositories\BaseRepository;

/**
 * Class MasterMemberSequencesRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 7:58 am UTC
*/

class MasterMemberSequencesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'seq'
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
        return MasterMemberSequences::class;
    }
}
