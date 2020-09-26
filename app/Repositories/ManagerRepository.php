<?php

namespace App\Repositories;

use App\Models\Manager;
use App\Repositories\BaseRepository;

/**
 * Class ManagerRepository
 * @package App\Repositories
 * @version September 23, 2020, 7:58 pm UTC
*/

class ManagerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'phone',
        'user_id'
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
        return Manager::class;
    }
}
