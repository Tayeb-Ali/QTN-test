<?php

namespace App\Http\Controllers;

use App\DataTables\EmployeeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Department;
use App\Repositories\EmployeeRepository;
use App\User;
use Exception;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Response;

class EmployeeController extends AppBaseController
{
    /** @var  EmployeeRepository */
    private $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepo)
    {
        $this->employeeRepository = $employeeRepo;
    }

    /**
     * Display a listing of the Employee.
     *
     * @param EmployeeDataTable $employeeDataTable
     * @return Response
     */
    public function index(EmployeeDataTable $employeeDataTable)
    {
        return $employeeDataTable->render('employees.index');
    }

    /**
     * Show the form for creating a new Employee.
     *
     * @return Response
     */
    public function create()
    {
        $department = Department::all()->pluck('name', 'id');
        $users = User::whereHas('role', function ($query) {
            return $query->where('name', 'employee');
        })->get()->pluck('name', 'id');
        $select = 1;
        $selecUser = 1;
        return view('employees.create', compact('department', 'select', 'employee', 'selecUser'));
    }

    /**
     * Store a newly created Employee in storage.
     *
     * @param CreateEmployeeRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployeeRequest $request)
    {
        $input = $request->all();
        if ($input['image']) {
            $input['image'] = self::saveFile($request);
            $this->employeeRepository->create($input);

            Flash::success(__('lang.saved_successfully', ['model' => __('models/employees.singular')]));

            return redirect(route('employees.index'));
        }
        $this->employeeRepository->create($input);

        Flash::success(__('lang.saved_successfully', ['model' => __('models/employees.singular')]));

        return redirect(route('employees.index'));
    }

    /**
     * Display the specified Employee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $employee = $this->employeeRepository->find($id);

        if (empty($employee)) {
            Flash::error(__('models/employees.singular') . ' ' . __('lang.not_found'));

            return redirect(route('employees.index'));
        }

        return view('employees.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified Employee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $employee = $this->employeeRepository->find($id)->first();

        if (empty($employee)) {
            Flash::error(__('lang.not_found', ['model' => __('models/employees.singular')]));

            return redirect(route('employees.index'));
        }

        $department = Department::all()->pluck('name', 'id');
        $users = User::whereHas('role', function ($query) {
            return $query->where('name', 'employee');
        })->get()->pluck('name', 'id');
        $select = $employee->department->id;
        $selecUser = $employee->user->id;
        return view('employees.edit', compact('employee', 'users', 'select', 'selecUser', 'department'));
    }

    /**
     * Update the specified Employee in storage.
     *
     * @param int $id
     * @param UpdateEmployeeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployeeRequest $request)
    {
        $employee = $this->employeeRepository->find($id);

        $input = $request->all();
        if (empty($employee)) {
            Flash::error(__('lang.not_found', ['model' => __('models/employees.singular')]));

            return redirect(route('employees.index'));
        }

        if ($input['image']) {
            $input['image'] = self::saveFile($request);
            $this->employeeRepository->update($input, $id);

            Flash::success(__('lang.updated_successfully', ['model' => __('models/employees.singular')]));

            return redirect(route('employees.index'));
        }

        $this->employeeRepository->update($request->all(), $id);

        Flash::success(__('lang.updated_successfully', ['model' => __('models/employees.singular')]));

        return redirect(route('employees.index'));
    }

    /**
     * Remove the specified Employee from storage.
     * @param int $id
     *
     * @return Response
     * @throws Exception
     */
    public function destroy($id)
    {
        $employee = $this->employeeRepository->find($id);

        if (empty($employee)) {
            Flash::error(__('lang.not_found', ['model' => __('models/employees.singular')]));

            return redirect(route('employees.index'));
        }

        $this->employeeRepository->delete($id);

        Flash::success(__('lang.deleted_successfully', ['model' => __('models/employees.singular')]));

        return redirect(route('employees.index'));
    }

    /**
     * @param Request $request
     * @return UrlGenerator|string
     */
    public function saveFile(Request $request)
    {
        try {
            $random = Str::random(10);
            $image = $request->file('image');
            $name = $random . '_logo_pr.' . $request->image->extension();
            $image->move(public_path() . '/profiles', $name);
            $name = url("profiles/$name");
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
        return $name;
    }
}
