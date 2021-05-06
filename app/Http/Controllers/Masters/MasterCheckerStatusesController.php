<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterCheckerStatusesRequest;
use App\Http\Requests\Masters\UpdateMasterCheckerStatusesRequest;
use App\Repositories\Masters\MasterCheckerStatusesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterCheckerStatusesController extends AppBaseController
{
    /** @var  MasterCheckerStatusesRepository */
    private $masterCheckerStatusesRepository;

    public function __construct(MasterCheckerStatusesRepository $masterCheckerStatusesRepo)
    {
        $this->masterCheckerStatusesRepository = $masterCheckerStatusesRepo;
    }

    /**
     * Display a listing of the MasterCheckerStatuses.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterCheckerStatuses = $this->masterCheckerStatusesRepository->paginate(20);

        return view('masters.master_checker_statuses.index')
            ->with('masterCheckerStatuses', $masterCheckerStatuses);
    }

    /**
     * Show the form for creating a new MasterCheckerStatuses.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_checker_statuses.create');
    }

    /**
     * Store a newly created MasterCheckerStatuses in storage.
     *
     * @param CreateMasterCheckerStatusesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterCheckerStatusesRequest $request)
    {
        $input = $request->all();

        $masterCheckerStatuses = $this->masterCheckerStatusesRepository->create($input);

        Flash::success('Master Checker Statuses saved successfully.');

        return redirect(route('masters.masterCheckerStatuses.index'));
    }

    /**
     * Display the specified MasterCheckerStatuses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterCheckerStatuses = $this->masterCheckerStatusesRepository->find($id);

        if (empty($masterCheckerStatuses)) {
            Flash::error('Master Checker Statuses not found');

            return redirect(route('masters.masterCheckerStatuses.index'));
        }

        return view('masters.master_checker_statuses.show')->with('masterCheckerStatuses', $masterCheckerStatuses);
    }

    /**
     * Show the form for editing the specified MasterCheckerStatuses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterCheckerStatuses = $this->masterCheckerStatusesRepository->find($id);

        if (empty($masterCheckerStatuses)) {
            Flash::error('Master Checker Statuses not found');

            return redirect(route('masters.masterCheckerStatuses.index'));
        }

        return view('masters.master_checker_statuses.edit')->with('masterCheckerStatuses', $masterCheckerStatuses);
    }

    /**
     * Update the specified MasterCheckerStatuses in storage.
     *
     * @param int $id
     * @param UpdateMasterCheckerStatusesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterCheckerStatusesRequest $request)
    {
        $masterCheckerStatuses = $this->masterCheckerStatusesRepository->find($id);

        if (empty($masterCheckerStatuses)) {
            Flash::error('Master Checker Statuses not found');

            return redirect(route('masters.masterCheckerStatuses.index'));
        }

        $masterCheckerStatuses = $this->masterCheckerStatusesRepository->update($request->all(), $id);

        Flash::success('Master Checker Statuses updated successfully.');

        return redirect(route('masters.masterCheckerStatuses.index'));
    }

    /**
     * Remove the specified MasterCheckerStatuses from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterCheckerStatuses = $this->masterCheckerStatusesRepository->find($id);

        if (empty($masterCheckerStatuses)) {
            Flash::error('Master Checker Statuses not found');

            return redirect(route('masters.masterCheckerStatuses.index'));
        }

        $this->masterCheckerStatusesRepository->delete($id);

        Flash::success('Master Checker Statuses deleted successfully.');

        return redirect(route('masters.masterCheckerStatuses.index'));
    }
}
