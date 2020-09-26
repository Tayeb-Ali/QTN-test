<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\QuotationProduct
 *
 * @property int $id
 * @property string|null $status
 * @property int $quotation_id
 * @property int $product_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|QuotationProduct newModelQuery()
 * @method static Builder|QuotationProduct newQuery()
 * @method static Builder|QuotationProduct query()
 * @method static Builder|QuotationProduct whereCreatedAt($value)
 * @method static Builder|QuotationProduct whereId($value)
 * @method static Builder|QuotationProduct whereProductId($value)
 * @method static Builder|QuotationProduct whereQuotationId($value)
 * @method static Builder|QuotationProduct whereStatus($value)
 * @method static Builder|QuotationProduct whereUpdatedAt($value)
 * @mixin Eloquent
 */
class QuotationProduct extends Model
{
    protected $table = 'quotation_products';

    protected $fillable = ['quotation_id', 'product_id', 'status'];

    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
