<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;

/**
 * App\Models\Branches
 *
 * @SWG\Definition (
 *      definition="Branches",
 *      required={"name", "address"},
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
 *          property="manager_id",
 *          description="manager_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="address",
 *          description="address",
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
 * @property int|null $manager_id
 * @property string $address
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Manager|null $manager
 * @method static \Illuminate\Database\Eloquent\Builder|Branches newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Branches newQuery()
 * @method static Builder|Branches onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Branches query()
 * @method static \Illuminate\Database\Eloquent\Builder|Branches whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branches whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branches whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branches whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branches whereManagerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branches whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branches whereUpdatedAt($value)
 * @method static Builder|Branches withTrashed()
 * @method static Builder|Branches withoutTrashed()
 * @mixin Model
 */
class Branches extends Model
{
    use SoftDeletes;

    public $table = 'branches';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'manager_id',
        'address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'manager_id' => 'integer',
        'address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:191',
        'manager_id' => 'nullable',
        'address' => 'required|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return BelongsTo
     **/
    public function manager()
    {
        return $this->belongsTo(Manager::class, 'manager_id');
    }
}
