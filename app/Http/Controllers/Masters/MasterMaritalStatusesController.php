<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterMaritalStatusesRequest;
use App\Http\Requests\Masters\UpdateMasterMaritalStatusesRequest;
use App\Repositories\Masters\MasterMaritalStatusesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterMaritalStatusesController extends AppBaseController
{
    /** @var  MasterMaritalStatusesRepository */
    private $masterMaritalStatusesRepository;

    public function __construct(MasterMaritalStatusesRepository $masterMaritalStatusesRepo)
    {
        $this->masterMaritalStatusesRepository = $masterMaritalStatusesRepo;
    }

    /**
     * Display a listing of the MasterMaritalStatuses.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterMaritalStatuses = $this->masterMaritalStatusesRepository->paginate(20);

        return view('masters.master_marital_statuses.index')
            ->with('masterMaritalStatuses', $masterMaritalStatuses);
    }

    /**
     * Show the form for creating a new MasterMaritalStatuses.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_marital_statuses.create');
    }

    /**
     * Store a newly created MasterMaritalStatuses in storage.
     *
     * @param CreateMasterMaritalStatusesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterMaritalStatusesRequest $request)
    {
        $input = $request->all();

        $masterMaritalStatuses = $this->masterMaritalStatusesRepository->create($input);

        Flash::success('Master Marital Statuses saved successfully.');

        return redirect(route('masters.masterMaritalStatuses.index'));
    }

    /**
     * Display the specified MasterMaritalStatuses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterMaritalStatuses = $this->masterMaritalStatusesRepository->find($id);

        if (empty($masterMaritalStatuses)) {
            Flash::error('Master Marital Statuses not found');

            return redirect(route('masters.masterMaritalStatuses.index'));
        }

        return view('masters.master_marital_statuses.show')->with('masterMaritalStatuses', $masterMaritalStatuses);
    }

    /**
     * Show the form for editing the specified MasterMaritalStatuses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterMaritalStatuses = $this->masterMaritalStatusesRepository->find($id);

        if (empty($masterMaritalStatuses)) {
            Flash::error('Master Marital Statuses not found');

            return redirect(route('masters.masterMaritalStatuses.index'));
        }

        return view('masters.master_marital_statuses.edit')->with('masterMaritalStatuses', $masterMaritalStatuses);
    }

    /**
     * Update the specified MasterMaritalStatuses in storage.
     *
     * @param int $id
     * @param UpdateMasterMaritalStatusesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterMaritalStatusesRequest $request)
    {
        $masterMaritalStatuses = $this->masterMaritalStatusesRepository->find($id);

        if (empty($masterMaritalStatuses)) {
            Flash::error('Master Marital Statuses not found');

            return redirect(route('masters.masterMaritalStatuses.index'));
        }

        $masterMaritalStatuses = $this->masterMaritalStatusesRepository->update($request->all(), $id);

        Flash::success('Master Marital Statuses updated successfully.');

        return redirect(route('masters.masterMaritalStatuses.index'));
    }

    /**
     * Remove the specified MasterMaritalStatuses from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterMaritalStatuses = $this->masterMaritalStatusesRepository->find($id);

        if (empty($masterMaritalStatuses)) {
            Flash::error('Master Marital Statuses not found');

            return redirect(route('masters.masterMaritalStatuses.index'));
        }

        $this->masterMaritalStatusesRepository->delete($id);

        Flash::success('Master Marital Statuses deleted successfully.');

        return redirect(route('masters.masterMaritalStatuses.index'));
    }
}
