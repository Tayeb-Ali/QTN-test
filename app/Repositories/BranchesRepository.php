<?php

namespace App\Repositories;

use App\Models\Branches;
use App\Repositories\BaseRepository;

/**
 * Class BranchesRepository
 * @package App\Repositories
 * @version September 23, 2020, 8:35 pm UTC
*/

class BranchesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'manager_id',
        'address'
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
        return Branches::class;
    }
}
