<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Categorie;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Response;

class ProductController extends AppBaseController
{
    /** @var  ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the Product.
     * @param ProductDataTable $productDataTable
     * @return Response
     */
    public function index(ProductDataTable $productDataTable)
    {
        return $productDataTable->render('products.index');
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        $cats = Categorie::all()->pluck('name', 'id');
        $select =1;
        return view('products.create', compact('cats', 'select'));
    }

    /**
     * Store a newly created Product in storage.
     * @param CreateProductRequest $request
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();

        $input['logo'] = $this->saveFile($request);
        $product = $this->productRepository->create($input);

        Flash::success(__('lang.saved_successfully', ['model' => __('models/products.singular')]));

        return redirect(route('products.index'));
    }

    /**
     * Display the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error(__('models/products.singular') . ' ' . __('lang.not_found'));

            return redirect(route('products.index'));
        }

        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error(__('lang.not_found', ['model' => __('models/products.singular')]));

            return redirect(route('products.index'));
        }
        $cats = Categorie::all()->pluck('name', 'id');
        $select = $product->category->id;
        return view('products.edit', compact(['product', 'cats', 'select']));
    }

    /**
     * Update the specified Product in storage.
     * @param int $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {

        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error(__('lang.not_found', ['model' => __('models/products.singular')]));

            return redirect(route('products.index'));
        }
        if ($request->has('logo')) {
            $input = $request->all();
            $input['logo'] = $this->saveFile($request);
            $this->productRepository->update($input, $id);
            Flash::success(__('lang.updated_successfully', ['model' => __('models/products.singular')]));

            return redirect(route('products.index'));
        }

        $product = $this->productRepository->update($request->all(), $id);

        Flash::success(__('lang.updated_successfully', ['model' => __('models/products.singular')]));

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified Product from storage.
     * @param int $id
     * @return Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error(__('lang.not_found', ['model' => __('models/products.singular')]));

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success(__('lang.deleted_successfully', ['model' => __('models/products.singular')]));

        return redirect(route('products.index'));
    }


    /**
     * @param Request $request
     * @return array
     */
    public function search(Request $request)
    {
        $product_code = explode(" ", $request['data']);
        $lims_product_data = Product::where('code', $product_code[0])->first();

        $product[] = $lims_product_data->name;
        $product[] = $lims_product_data->code;
        $product[] = $lims_product_data->qty;
        $product[] = $lims_product_data->price;
        $product[] = $lims_product_data->id;
        return $product;
    }

    public function limsProductSearch(Request $request)
    {
        $product_code = explode(" ", $request['data']);

        $lims_product_data = Product::where('code', $product_code[0])->first();
        $product[] = $lims_product_data->name;
        $product[] = $lims_product_data->code;
        $product[] = $lims_product_data->price;
        return $product;
    }

    public function saveFile(Request $request)
    {
        try {
            $random = Str::random(10);
            $image = $request->file('logo');
            $name = $random . '_logo_pr.' . $request->logo->extension();
            $image->move(public_path() . '/logo', $name);
            $name = url("logo/$name");
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
        return $name;
    }
}
