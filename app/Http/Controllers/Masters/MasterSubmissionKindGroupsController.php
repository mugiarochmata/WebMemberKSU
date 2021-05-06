<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterSubmissionKindGroupsRequest;
use App\Http\Requests\Masters\UpdateMasterSubmissionKindGroupsRequest;
use App\Repositories\Masters\MasterSubmissionKindGroupsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterSubmissionKindGroupsController extends AppBaseController
{
    /** @var  MasterSubmissionKindGroupsRepository */
    private $masterSubmissionKindGroupsRepository;

    public function __construct(MasterSubmissionKindGroupsRepository $masterSubmissionKindGroupsRepo)
    {
        $this->masterSubmissionKindGroupsRepository = $masterSubmissionKindGroupsRepo;
    }

    /**
     * Display a listing of the MasterSubmissionKindGroups.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterSubmissionKindGroups = $this->masterSubmissionKindGroupsRepository->paginate(20);

        return view('masters.master_submission_kind_groups.index')
            ->with('masterSubmissionKindGroups', $masterSubmissionKindGroups);
    }

    /**
     * Show the form for creating a new MasterSubmissionKindGroups.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_submission_kind_groups.create');
    }

    /**
     * Store a newly created MasterSubmissionKindGroups in storage.
     *
     * @param CreateMasterSubmissionKindGroupsRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterSubmissionKindGroupsRequest $request)
    {
        $input = $request->all();

        $masterSubmissionKindGroups = $this->masterSubmissionKindGroupsRepository->create($input);

        Flash::success('Master Submission Kind Groups saved successfully.');

        return redirect(route('masters.masterSubmissionKindGroups.index'));
    }

    /**
     * Display the specified MasterSubmissionKindGroups.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterSubmissionKindGroups = $this->masterSubmissionKindGroupsRepository->find($id);

        if (empty($masterSubmissionKindGroups)) {
            Flash::error('Master Submission Kind Groups not found');

            return redirect(route('masters.masterSubmissionKindGroups.index'));
        }

        return view('masters.master_submission_kind_groups.show')->with('masterSubmissionKindGroups', $masterSubmissionKindGroups);
    }

    /**
     * Show the form for editing the specified MasterSubmissionKindGroups.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterSubmissionKindGroups = $this->masterSubmissionKindGroupsRepository->find($id);

        if (empty($masterSubmissionKindGroups)) {
            Flash::error('Master Submission Kind Groups not found');

            return redirect(route('masters.masterSubmissionKindGroups.index'));
        }

        return view('masters.master_submission_kind_groups.edit')->with('masterSubmissionKindGroups', $masterSubmissionKindGroups);
    }

    /**
     * Update the specified MasterSubmissionKindGroups in storage.
     *
     * @param int $id
     * @param UpdateMasterSubmissionKindGroupsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterSubmissionKindGroupsRequest $request)
    {
        $masterSubmissionKindGroups = $this->masterSubmissionKindGroupsRepository->find($id);

        if (empty($masterSubmissionKindGroups)) {
            Flash::error('Master Submission Kind Groups not found');

            return redirect(route('masters.masterSubmissionKindGroups.index'));
        }

        $masterSubmissionKindGroups = $this->masterSubmissionKindGroupsRepository->update($request->all(), $id);

        Flash::success('Master Submission Kind Groups updated successfully.');

        return redirect(route('masters.masterSubmissionKindGroups.index'));
    }

    /**
     * Remove the specified MasterSubmissionKindGroups from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterSubmissionKindGroups = $this->masterSubmissionKindGroupsRepository->find($id);

        if (empty($masterSubmissionKindGroups)) {
            Flash::error('Master Submission Kind Groups not found');

            return redirect(route('masters.masterSubmissionKindGroups.index'));
        }

        $this->masterSubmissionKindGroupsRepository->delete($id);

        Flash::success('Master Submission Kind Groups deleted successfully.');

        return redirect(route('masters.masterSubmissionKindGroups.index'));
    }
}
