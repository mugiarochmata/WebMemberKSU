<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterSavingStatusesRequest;
use App\Http\Requests\Masters\UpdateMasterSavingStatusesRequest;
use App\Repositories\Masters\MasterSavingStatusesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterSavingStatusesController extends AppBaseController
{
    /** @var  MasterSavingStatusesRepository */
    private $masterSavingStatusesRepository;

    public function __construct(MasterSavingStatusesRepository $masterSavingStatusesRepo)
    {
        $this->masterSavingStatusesRepository = $masterSavingStatusesRepo;
    }

    /**
     * Display a listing of the MasterSavingStatuses.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterSavingStatuses = $this->masterSavingStatusesRepository->paginate(20);

        return view('masters.master_saving_statuses.index')
            ->with('masterSavingStatuses', $masterSavingStatuses);
    }

    /**
     * Show the form for creating a new MasterSavingStatuses.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_saving_statuses.create');
    }

    /**
     * Store a newly created MasterSavingStatuses in storage.
     *
     * @param CreateMasterSavingStatusesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterSavingStatusesRequest $request)
    {
        $input = $request->all();

        $masterSavingStatuses = $this->masterSavingStatusesRepository->create($input);

        Flash::success('Master Saving Statuses saved successfully.');

        return redirect(route('masters.masterSavingStatuses.index'));
    }

    /**
     * Display the specified MasterSavingStatuses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterSavingStatuses = $this->masterSavingStatusesRepository->find($id);

        if (empty($masterSavingStatuses)) {
            Flash::error('Master Saving Statuses not found');

            return redirect(route('masters.masterSavingStatuses.index'));
        }

        return view('masters.master_saving_statuses.show')->with('masterSavingStatuses', $masterSavingStatuses);
    }

    /**
     * Show the form for editing the specified MasterSavingStatuses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterSavingStatuses = $this->masterSavingStatusesRepository->find($id);

        if (empty($masterSavingStatuses)) {
            Flash::error('Master Saving Statuses not found');

            return redirect(route('masters.masterSavingStatuses.index'));
        }

        return view('masters.master_saving_statuses.edit')->with('masterSavingStatuses', $masterSavingStatuses);
    }

    /**
     * Update the specified MasterSavingStatuses in storage.
     *
     * @param int $id
     * @param UpdateMasterSavingStatusesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterSavingStatusesRequest $request)
    {
        $masterSavingStatuses = $this->masterSavingStatusesRepository->find($id);

        if (empty($masterSavingStatuses)) {
            Flash::error('Master Saving Statuses not found');

            return redirect(route('masters.masterSavingStatuses.index'));
        }

        $masterSavingStatuses = $this->masterSavingStatusesRepository->update($request->all(), $id);

        Flash::success('Master Saving Statuses updated successfully.');

        return redirect(route('masters.masterSavingStatuses.index'));
    }

    /**
     * Remove the specified MasterSavingStatuses from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterSavingStatuses = $this->masterSavingStatusesRepository->find($id);

        if (empty($masterSavingStatuses)) {
            Flash::error('Master Saving Statuses not found');

            return redirect(route('masters.masterSavingStatuses.index'));
        }

        $this->masterSavingStatusesRepository->delete($id);

        Flash::success('Master Saving Statuses deleted successfully.');

        return redirect(route('masters.masterSavingStatuses.index'));
    }
}
