<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;

/**
 * App\Models\Categorie
 *
 * @SWG\Definition (
 *      definition="Categorie",
 *      required={"name", "logo"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="logo",
 *          description="logo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="deleted_at",
 *          description="deleted_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 * @property int $id
 * @property string $name
 * @property string $logo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection|Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie newQuery()
 * @method static Builder|Categorie onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie query()
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereUpdatedAt($value)
 * @method static Builder|Categorie withTrashed()
 * @method static Builder|Categorie withoutTrashed()
 * @mixin Model
 */
class Categorie extends Model
{
    use SoftDeletes;

    public $table = 'categories';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'logo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'logo' => 'required'
    ];

    /**
     * @return HasMany
     **/
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
