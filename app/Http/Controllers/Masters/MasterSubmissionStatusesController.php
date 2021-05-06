<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterSubmissionStatusesRequest;
use App\Http\Requests\Masters\UpdateMasterSubmissionStatusesRequest;
use App\Repositories\Masters\MasterSubmissionStatusesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterSubmissionStatusesController extends AppBaseController
{
    /** @var  MasterSubmissionStatusesRepository */
    private $masterSubmissionStatusesRepository;

    public function __construct(MasterSubmissionStatusesRepository $masterSubmissionStatusesRepo)
    {
        $this->masterSubmissionStatusesRepository = $masterSubmissionStatusesRepo;
    }

    /**
     * Display a listing of the MasterSubmissionStatuses.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterSubmissionStatuses = $this->masterSubmissionStatusesRepository->paginate(20);

        return view('masters.master_submission_statuses.index')
            ->with('masterSubmissionStatuses', $masterSubmissionStatuses);
    }

    /**
     * Show the form for creating a new MasterSubmissionStatuses.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_submission_statuses.create');
    }

    /**
     * Store a newly created MasterSubmissionStatuses in storage.
     *
     * @param CreateMasterSubmissionStatusesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterSubmissionStatusesRequest $request)
    {
        $input = $request->all();

        $masterSubmissionStatuses = $this->masterSubmissionStatusesRepository->create($input);

        Flash::success('Master Submission Statuses saved successfully.');

        return redirect(route('masters.masterSubmissionStatuses.index'));
    }

    /**
     * Display the specified MasterSubmissionStatuses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterSubmissionStatuses = $this->masterSubmissionStatusesRepository->find($id);

        if (empty($masterSubmissionStatuses)) {
            Flash::error('Master Submission Statuses not found');

            return redirect(route('masters.masterSubmissionStatuses.index'));
        }

        return view('masters.master_submission_statuses.show')->with('masterSubmissionStatuses', $masterSubmissionStatuses);
    }

    /**
     * Show the form for editing the specified MasterSubmissionStatuses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterSubmissionStatuses = $this->masterSubmissionStatusesRepository->find($id);

        if (empty($masterSubmissionStatuses)) {
            Flash::error('Master Submission Statuses not found');

            return redirect(route('masters.masterSubmissionStatuses.index'));
        }

        return view('masters.master_submission_statuses.edit')->with('masterSubmissionStatuses', $masterSubmissionStatuses);
    }

    /**
     * Update the specified MasterSubmissionStatuses in storage.
     *
     * @param int $id
     * @param UpdateMasterSubmissionStatusesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterSubmissionStatusesRequest $request)
    {
        $masterSubmissionStatuses = $this->masterSubmissionStatusesRepository->find($id);

        if (empty($masterSubmissionStatuses)) {
            Flash::error('Master Submission Statuses not found');

            return redirect(route('masters.masterSubmissionStatuses.index'));
        }

        $masterSubmissionStatuses = $this->masterSubmissionStatusesRepository->update($request->all(), $id);

        Flash::success('Master Submission Statuses updated successfully.');

        return redirect(route('masters.masterSubmissionStatuses.index'));
    }

    /**
     * Remove the specified MasterSubmissionStatuses from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterSubmissionStatuses = $this->masterSubmissionStatusesRepository->find($id);

        if (empty($masterSubmissionStatuses)) {
            Flash::error('Master Submission Statuses not found');

            return redirect(route('masters.masterSubmissionStatuses.index'));
        }

        $this->masterSubmissionStatusesRepository->delete($id);

        Flash::success('Master Submission Statuses deleted successfully.');

        return redirect(route('masters.masterSubmissionStatuses.index'));
    }
}
