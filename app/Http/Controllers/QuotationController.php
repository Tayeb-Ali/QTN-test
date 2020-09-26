<?php

namespace App\Http\Controllers;

use App\DataTables\QuotationDataTable;
use App\Http\Requests\CreateQuotationRequest;
use App\Http\Requests\UpdateQuotationRequest;
use App\Models\Customer;
use App\Models\Department;
use App\Models\Product;
use App\Models\Supplier;
use App\Repositories\QuotationRepository;
use Flash;
use Response;

class QuotationController extends AppBaseController
{
    /** @var  QuotationRepository */
    private $quotationRepository;

    public function __construct(QuotationRepository $quotationRepo)
    {
        $this->quotationRepository = $quotationRepo;
    }

    /**
     * Display a listing of the Quotation.
     *
     * @param QuotationDataTable $quotationDataTable
     * @return Response
     */
    public function index(QuotationDataTable $quotationDataTable)
    {
        return $quotationDataTable->render('quotations.index');
    }

    /**
     * Show the form for creating a new Quotation.
     *
     * @return Response
     */
    public function create()
    {
        $product = Product::all();
        $supplier = Supplier::all();
        $department = Department::all();
        $customer = Customer::all();
        return view('quotations.create', compact(['product', 'supplier', 'department', 'customer']));
    }

    /**
     * Store a newly created Quotation in storage.
     *
     * @param CreateQuotationRequest $request
     *
     * @return Response
     */
    public function store(CreateQuotationRequest $request)
    {
        $quotation = $this->quotationRepository->create($request);

        Flash::success(__('lang.saved_successfully', ['model' => __('models/quotations.singular')]));

        return redirect(route('quotations.index'));
    }

    /**
     * Display the specified Quotation.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $quotation = $this->quotationRepository->find($id);

        if (empty($quotation)) {
            Flash::error(__('models/quotations.singular') . ' ' . __('lang.not_found'));

            return redirect(route('quotations.index'));
        }

        return view('quotations.show')->with('quotation', $quotation);
    }

    /**
     * Show the form for editing the specified Quotation.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $quotation = $this->quotationRepository->find($id);

        if (empty($quotation)) {
            Flash::error(__('lang.not_found', ['model' => __('models/quotations.singular')]));

            return redirect(route('quotations.index'));
        }
        $product = Product::all();
        $supplier = Supplier::all();
        $department = Department::all();
        $customer = Customer::all();
        return view('quotations.edit', compact(['quotation', 'product', 'supplier', 'department', 'customer']));
//        return view('quotations.')->with('quotation', $quotation);
    }

    /**
     * Update the specified Quotation in storage.
     *
     * @param int $id
     * @param UpdateQuotationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuotationRequest $request)
    {
        $quotation = $this->quotationRepository->find($id);

        if (empty($quotation)) {
            Flash::error(__('lang.not_found', ['model' => __('models/quotations.singular')]));

            return redirect(route('quotations.index'));
        }

        $quotation = $this->quotationRepository->update($request->all(), $id);

        Flash::success(__('lang.updated_successfully', ['model' => __('models/quotations.singular')]));

        return redirect(route('quotations.index'));
    }

    /**
     * Remove the specified Quotation from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $quotation = $this->quotationRepository->find($id);

        if (empty($quotation)) {
            Flash::error(__('lang.not_found', ['model' => __('models/quotations.singular')]));

            return redirect(route('quotations.index'));
        }

        $this->quotationRepository->delete($id);

        Flash::success(__('lang.deleted_successfully', ['model' => __('models/quotations.singular')]));

        return redirect(route('quotations.index'));
    }
}
