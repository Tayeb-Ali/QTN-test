<?php

namespace App\Http\Controllers;

use App\DataTables\BranchesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBranchesRequest;
use App\Http\Requests\UpdateBranchesRequest;
use App\Models\Manager;
use App\Repositories\BranchesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BranchesController extends AppBaseController
{
    /** @var  BranchesRepository */
    private $branchesRepository;

    public function __construct(BranchesRepository $branchesRepo)
    {
        $this->branchesRepository = $branchesRepo;
    }

    /**
     * Display a listing of the Branches.
     *
     * @param BranchesDataTable $branchesDataTable
     * @return Response
     */
    public function index(BranchesDataTable $branchesDataTable)
    {
        return $branchesDataTable->render('branches.index');
    }

    /**
     * Show the form for creating a new Branches.
     *
     * @return Response
     */
    public function create()
    {
        $managers = Manager::all()->pluck('name', 'id');
        $select = 1;
        return view('branches.create', compact('managers', 'select'));
    }

    /**
     * Store a newly created Branches in storage.
     *
     * @param CreateBranchesRequest $request
     *
     * @return Response
     */
    public function store(CreateBranchesRequest $request)
    {
        $input = $request->all();

        $branches = $this->branchesRepository->create($input);

        Flash::success(__('lang.saved_successfully', ['model' => __('models/branches.singular')]));

        return redirect(route('branches.index'));
    }

    /**
     * Display the specified Branches.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $branches = $this->branchesRepository->find($id);

        if (empty($branches)) {
            Flash::error(__('models/branches.singular') . ' ' . __('lang.not_found'));

            return redirect(route('branches.index'));
        }

        return view('branches.show')->with('branches', $branches);
    }

    /**
     * Show the form for editing the specified Branches.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $branches = $this->branchesRepository->find($id);

        if (empty($branches)) {
            Flash::error(__('lang.not_found', ['model' => __('models/branches.singular')]));

            return redirect(route('branches.index'));
        }

        $managers = Manager::all()->pluck('name', 'id');
        $select = $branches->manager->id;
        return view('branches.edit', compact(['branches', 'select', 'managers']));
    }

    /**
     * Update the specified Branches in storage.
     *
     * @param int $id
     * @param UpdateBranchesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBranchesRequest $request)
    {
        $branches = $this->branchesRepository->find($id);

        if (empty($branches)) {
            Flash::error(__('lang.not_found', ['model' => __('models/branches.singular')]));

            return redirect(route('branches.index'));
        }

        $branches = $this->branchesRepository->update($request->all(), $id);

        Flash::success(__('lang.updated_successfully', ['model' => __('models/branches.singular')]));

        return redirect(route('branches.index'));
    }

    /**
     * Remove the specified Branches from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $branches = $this->branchesRepository->find($id);

        if (empty($branches)) {
            Flash::error(__('lang.not_found', ['model' => __('models/branches.singular')]));

            return redirect(route('branches.index'));
        }

        $this->branchesRepository->delete($id);

        Flash::success(__('lang.deleted_successfully', ['model' => __('models/branches.singular')]));

        return redirect(route('branches.index'));
    }
}
