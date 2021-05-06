<?php

namespace App\Repositories\Masters;

use App\Models\Masters\MasterTransactionStatuses;
use App\Repositories\BaseRepository;

/**
 * Class MasterTransactionStatusesRepository
 * @package App\Repositories\Masters
 * @version November 22, 2020, 8:04 am UTC
*/

class MasterTransactionStatusesRepository extends BaseRepository
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
        return MasterTransactionStatuses::class;
    }
}
