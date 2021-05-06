<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterSubmissionKindsRequest;
use App\Http\Requests\Masters\UpdateMasterSubmissionKindsRequest;
use App\Repositories\Masters\MasterSubmissionKindsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterSubmissionKindsController extends AppBaseController
{
    /** @var  MasterSubmissionKindsRepository */
    private $masterSubmissionKindsRepository;

    public function __construct(MasterSubmissionKindsRepository $masterSubmissionKindsRepo)
    {
        $this->masterSubmissionKindsRepository = $masterSubmissionKindsRepo;
    }

    /**
     * Display a listing of the MasterSubmissionKinds.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterSubmissionKinds = $this->masterSubmissionKindsRepository->paginate(20);

        return view('masters.master_submission_kinds.index')
            ->with('masterSubmissionKinds', $masterSubmissionKinds);
    }

    /**
     * Show the form for creating a new MasterSubmissionKinds.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_submission_kinds.create');
    }

    /**
     * Store a newly created MasterSubmissionKinds in storage.
     *
     * @param CreateMasterSubmissionKindsRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterSubmissionKindsRequest $request)
    {
        $input = $request->all();

        $masterSubmissionKinds = $this->masterSubmissionKindsRepository->create($input);

        Flash::success('Master Submission Kinds saved successfully.');

        return redirect(route('masters.masterSubmissionKinds.index'));
    }

    /**
     * Display the specified MasterSubmissionKinds.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterSubmissionKinds = $this->masterSubmissionKindsRepository->find($id);

        if (empty($masterSubmissionKinds)) {
            Flash::error('Master Submission Kinds not found');

            return redirect(route('masters.masterSubmissionKinds.index'));
        }

        return view('masters.master_submission_kinds.show')->with('masterSubmissionKinds', $masterSubmissionKinds);
    }

    /**
     * Show the form for editing the specified MasterSubmissionKinds.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterSubmissionKinds = $this->masterSubmissionKindsRepository->find($id);

        if (empty($masterSubmissionKinds)) {
            Flash::error('Master Submission Kinds not found');

            return redirect(route('masters.masterSubmissionKinds.index'));
        }

        return view('masters.master_submission_kinds.edit')->with('masterSubmissionKinds', $masterSubmissionKinds);
    }

    /**
     * Update the specified MasterSubmissionKinds in storage.
     *
     * @param int $id
     * @param UpdateMasterSubmissionKindsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterSubmissionKindsRequest $request)
    {
        $masterSubmissionKinds = $this->masterSubmissionKindsRepository->find($id);

        if (empty($masterSubmissionKinds)) {
            Flash::error('Master Submission Kinds not found');

            return redirect(route('masters.masterSubmissionKinds.index'));
        }

        $masterSubmissionKinds = $this->masterSubmissionKindsRepository->update($request->all(), $id);

        Flash::success('Master Submission Kinds updated successfully.');

        return redirect(route('masters.masterSubmissionKinds.index'));
    }

    /**
     * Remove the specified MasterSubmissionKinds from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterSubmissionKinds = $this->masterSubmissionKindsRepository->find($id);

        if (empty($masterSubmissionKinds)) {
            Flash::error('Master Submission Kinds not found');

            return redirect(route('masters.masterSubmissionKinds.index'));
        }

        $this->masterSubmissionKindsRepository->delete($id);

        Flash::success('Master Submission Kinds deleted successfully.');

        return redirect(route('masters.masterSubmissionKinds.index'));
    }
}
