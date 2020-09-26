<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\Quotation;
use App\Models\QuotationProduct;
use Auth;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class QuotationRepository
 * @package App\Repositories
 * @version September 23, 2020, 8:37 pm UTC
 */
class QuotationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'reference_no',
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
        return Quotation::class;
    }

    /**
     * @param Request $request
     * @return Model
     */
    public function create($request)
    {
        $input = $request->all();
        $user = Auth::user();
        $input['user_id'] = $user->id;
        $input['reference_no'] = "inv_$request->reference_no";
        $product = $request->product_id;
        if ($request->hasFile('document')) {
            $input['document'] = $this->saveFile($request);
            $model = $this->model->newInstance($input);
            $model->save();
            $model->product()->attach($product);

            return $model;
        } else {
            $model = $this->model->newInstance($input);
            $model->save();
            return $model->product()->attach($product);
        }
    }


    /**
     * @param $request
     * @param $userId
     * @param $employId
     * @return UrlGenerator|string
     */
    public function saveFile($request)
    {
        $random = Str::random(10);
        $image = $request->file('document');
        $name = $random . '_document.' . $request->document->extension();
        $image->move(base_path() . '/public/docs/', $name);
        $name = url("docs/$name");
        return $name;
    }
}
