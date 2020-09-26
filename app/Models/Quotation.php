<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;

/**
 * App\Models\Quotation
 *
 * @SWG\Definition (
 *      definition="Quotation",
 *      required={"reference_no", "item", "quotation_status", "user_id", "supplier_id", "customer_id", "department_id"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="reference_no",
 *          description="reference_no",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="item",
 *          description="item",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="total_qty",
 *          description="total_qty",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="total_price",
 *          description="total_price",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="quotation_status",
 *          description="quotation_status",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="document",
 *          description="document",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="note",
 *          description="note",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="user_id",
 *          description="user_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="supplier_id",
 *          description="supplier_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="customer_id",
 *          description="customer_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="department_id",
 *          description="department_id",
 *          type="integer",
 *          format="int32"
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
 * @property string $reference_no
 * @property int $item
 * @property float|null $total_qty
 * @property float|null $total_price
 * @property int $quotation_status
 * @property string|null $document
 * @property string|null $note
 * @property int $user_id
 * @property int $supplier_id
 * @property int $customer_id
 * @property int $department_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Customer $customer
 * @property-read Department $department
 * @property-read Supplier $supplier
 * @property-read User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation newQuery()
 * @method static Builder|Quotation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereGrandTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereOrderTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereOrderTaxRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereQuotationStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereReferenceNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereSupplierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereTotalDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereTotalQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereTotalTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quotation whereUserId($value)
 * @method static Builder|Quotation withTrashed()
 * @method static Builder|Quotation withoutTrashed()
 * @mixin Model
 */
class Quotation extends Model
{
    use SoftDeletes;

    public $table = 'quotations';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'reference_no',
        'item',
        'total_qty',
        'total_price',
        'quotation_status',
        'document',
        'note',
        'user_id',
        'supplier_id',
        'customer_id',
        'department_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'reference_no' => 'string',
        'total_qty' => 'float',
        'total_price' => 'float',
        'quotation_status' => 'integer',
        'document' => 'string',
        'note' => 'string',
        'user_id' => 'integer',
        'supplier_id' => 'integer',
        'customer_id' => 'integer',
        'department_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'reference_no' => 'required|string|max:191',
        'total_qty' => 'nullable|numeric',
        'total_price' => 'nullable|numeric',
        'quotation_status' => 'required',
        'document' => 'nullable|string|max:191',
        'note' => 'nullable|string',
        'user_id' => 'nullable',
        'supplier_id' => 'required',
        'customer_id' => 'required',
        'department_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];


    public function product()
    {
        return $this->belongsToMany(QuotationProduct::class, 'quotation_products', 'quotation_id', 'product_id');
    }

    /**
     * @return BelongsTo
     **/
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    /**
     * @return BelongsTo
     **/
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    /**
     * @return BelongsTo
     **/
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    /**
     * @return BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
