<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterEmployeeStatusesRequest;
use App\Http\Requests\Masters\UpdateMasterEmployeeStatusesRequest;
use App\Repositories\Masters\MasterEmployeeStatusesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterEmployeeStatusesController extends AppBaseController
{
    /** @var  MasterEmployeeStatusesRepository */
    private $masterEmployeeStatusesRepository;

    public function __construct(MasterEmployeeStatusesRepository $masterEmployeeStatusesRepo)
    {
        $this->masterEmployeeStatusesRepository = $masterEmployeeStatusesRepo;
    }

    /**
     * Display a listing of the MasterEmployeeStatuses.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterEmployeeStatuses = $this->masterEmployeeStatusesRepository->paginate(20);

        return view('masters.master_employee_statuses.index')
            ->with('masterEmployeeStatuses', $masterEmployeeStatuses);
    }

    /**
     * Show the form for creating a new MasterEmployeeStatuses.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_employee_statuses.create');
    }

    /**
     * Store a newly created MasterEmployeeStatuses in storage.
     *
     * @param CreateMasterEmployeeStatusesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterEmployeeStatusesRequest $request)
    {
        $input = $request->all();

        $masterEmployeeStatuses = $this->masterEmployeeStatusesRepository->create($input);

        Flash::success('Master Employee Statuses saved successfully.');

        return redirect(route('masters.masterEmployeeStatuses.index'));
    }

    /**
     * Display the specified MasterEmployeeStatuses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterEmployeeStatuses = $this->masterEmployeeStatusesRepository->find($id);

        if (empty($masterEmployeeStatuses)) {
            Flash::error('Master Employee Statuses not found');

            return redirect(route('masters.masterEmployeeStatuses.index'));
        }

        return view('masters.master_employee_statuses.show')->with('masterEmployeeStatuses', $masterEmployeeStatuses);
    }

    /**
     * Show the form for editing the specified MasterEmployeeStatuses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterEmployeeStatuses = $this->masterEmployeeStatusesRepository->find($id);

        if (empty($masterEmployeeStatuses)) {
            Flash::error('Master Employee Statuses not found');

            return redirect(route('masters.masterEmployeeStatuses.index'));
        }

        return view('masters.master_employee_statuses.edit')->with('masterEmployeeStatuses', $masterEmployeeStatuses);
    }

    /**
     * Update the specified MasterEmployeeStatuses in storage.
     *
     * @param int $id
     * @param UpdateMasterEmployeeStatusesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterEmployeeStatusesRequest $request)
    {
        $masterEmployeeStatuses = $this->masterEmployeeStatusesRepository->find($id);

        if (empty($masterEmployeeStatuses)) {
            Flash::error('Master Employee Statuses not found');

            return redirect(route('masters.masterEmployeeStatuses.index'));
        }

        $masterEmployeeStatuses = $this->masterEmployeeStatusesRepository->update($request->all(), $id);

        Flash::success('Master Employee Statuses updated successfully.');

        return redirect(route('masters.masterEmployeeStatuses.index'));
    }

    /**
     * Remove the specified MasterEmployeeStatuses from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterEmployeeStatuses = $this->masterEmployeeStatusesRepository->find($id);

        if (empty($masterEmployeeStatuses)) {
            Flash::error('Master Employee Statuses not found');

            return redirect(route('masters.masterEmployeeStatuses.index'));
        }

        $this->masterEmployeeStatusesRepository->delete($id);

        Flash::success('Master Employee Statuses deleted successfully.');

        return redirect(route('masters.masterEmployeeStatuses.index'));
    }
}
