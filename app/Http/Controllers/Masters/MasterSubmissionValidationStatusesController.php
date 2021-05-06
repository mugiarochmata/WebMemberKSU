<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterSubmissionValidationStatusesRequest;
use App\Http\Requests\Masters\UpdateMasterSubmissionValidationStatusesRequest;
use App\Repositories\Masters\MasterSubmissionValidationStatusesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterSubmissionValidationStatusesController extends AppBaseController
{
    /** @var  MasterSubmissionValidationStatusesRepository */
    private $masterSubmissionValidationStatusesRepository;

    public function __construct(MasterSubmissionValidationStatusesRepository $masterSubmissionValidationStatusesRepo)
    {
        $this->masterSubmissionValidationStatusesRepository = $masterSubmissionValidationStatusesRepo;
    }

    /**
     * Display a listing of the MasterSubmissionValidationStatuses.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterSubmissionValidationStatuses = $this->masterSubmissionValidationStatusesRepository->paginate(20);

        return view('masters.master_submission_validation_statuses.index')
            ->with('masterSubmissionValidationStatuses', $masterSubmissionValidationStatuses);
    }

    /**
     * Show the form for creating a new MasterSubmissionValidationStatuses.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_submission_validation_statuses.create');
    }

    /**
     * Store a newly created MasterSubmissionValidationStatuses in storage.
     *
     * @param CreateMasterSubmissionValidationStatusesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterSubmissionValidationStatusesRequest $request)
    {
        $input = $request->all();

        $masterSubmissionValidationStatuses = $this->masterSubmissionValidationStatusesRepository->create($input);

        Flash::success('Master Submission Validation Statuses saved successfully.');

        return redirect(route('masters.masterSubmissionValidationStatuses.index'));
    }

    /**
     * Display the specified MasterSubmissionValidationStatuses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterSubmissionValidationStatuses = $this->masterSubmissionValidationStatusesRepository->find($id);

        if (empty($masterSubmissionValidationStatuses)) {
            Flash::error('Master Submission Validation Statuses not found');

            return redirect(route('masters.masterSubmissionValidationStatuses.index'));
        }

        return view('masters.master_submission_validation_statuses.show')->with('masterSubmissionValidationStatuses', $masterSubmissionValidationStatuses);
    }

    /**
     * Show the form for editing the specified MasterSubmissionValidationStatuses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterSubmissionValidationStatuses = $this->masterSubmissionValidationStatusesRepository->find($id);

        if (empty($masterSubmissionValidationStatuses)) {
            Flash::error('Master Submission Validation Statuses not found');

            return redirect(route('masters.masterSubmissionValidationStatuses.index'));
        }

        return view('masters.master_submission_validation_statuses.edit')->with('masterSubmissionValidationStatuses', $masterSubmissionValidationStatuses);
    }

    /**
     * Update the specified MasterSubmissionValidationStatuses in storage.
     *
     * @param int $id
     * @param UpdateMasterSubmissionValidationStatusesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterSubmissionValidationStatusesRequest $request)
    {
        $masterSubmissionValidationStatuses = $this->masterSubmissionValidationStatusesRepository->find($id);

        if (empty($masterSubmissionValidationStatuses)) {
            Flash::error('Master Submission Validation Statuses not found');

            return redirect(route('masters.masterSubmissionValidationStatuses.index'));
        }

        $masterSubmissionValidationStatuses = $this->masterSubmissionValidationStatusesRepository->update($request->all(), $id);

        Flash::success('Master Submission Validation Statuses updated successfully.');

        return redirect(route('masters.masterSubmissionValidationStatuses.index'));
    }

    /**
     * Remove the specified MasterSubmissionValidationStatuses from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterSubmissionValidationStatuses = $this->masterSubmissionValidationStatusesRepository->find($id);

        if (empty($masterSubmissionValidationStatuses)) {
            Flash::error('Master Submission Validation Statuses not found');

            return redirect(route('masters.masterSubmissionValidationStatuses.index'));
        }

        $this->masterSubmissionValidationStatusesRepository->delete($id);

        Flash::success('Master Submission Validation Statuses deleted successfully.');

        return redirect(route('masters.masterSubmissionValidationStatuses.index'));
    }
}
