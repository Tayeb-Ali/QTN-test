<?php

namespace App\Repositories;

use App\Models\Categorie;
use App\Repositories\BaseRepository;

/**
 * Class CategorieRepository
 * @package App\Repositories
 * @version September 23, 2020, 7:59 pm UTC
*/

class CategorieRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'logo'
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
        return Categorie::class;
    }
}
