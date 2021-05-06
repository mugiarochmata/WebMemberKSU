<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterSubmissionValidationRulesRequest;
use App\Http\Requests\Masters\UpdateMasterSubmissionValidationRulesRequest;
use App\Repositories\Masters\MasterSubmissionValidationRulesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterSubmissionValidationRulesController extends AppBaseController
{
    /** @var  MasterSubmissionValidationRulesRepository */
    private $masterSubmissionValidationRulesRepository;

    public function __construct(MasterSubmissionValidationRulesRepository $masterSubmissionValidationRulesRepo)
    {
        $this->masterSubmissionValidationRulesRepository = $masterSubmissionValidationRulesRepo;
    }

    /**
     * Display a listing of the MasterSubmissionValidationRules.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterSubmissionValidationRules = $this->masterSubmissionValidationRulesRepository->paginate(20);

        return view('masters.master_submission_validation_rules.index')
            ->with('masterSubmissionValidationRules', $masterSubmissionValidationRules);
    }

    /**
     * Show the form for creating a new MasterSubmissionValidationRules.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_submission_validation_rules.create');
    }

    /**
     * Store a newly created MasterSubmissionValidationRules in storage.
     *
     * @param CreateMasterSubmissionValidationRulesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterSubmissionValidationRulesRequest $request)
    {
        $input = $request->all();

        $masterSubmissionValidationRules = $this->masterSubmissionValidationRulesRepository->create($input);

        Flash::success('Master Submission Validation Rules saved successfully.');

        return redirect(route('masters.masterSubmissionValidationRules.index'));
    }

    /**
     * Display the specified MasterSubmissionValidationRules.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterSubmissionValidationRules = $this->masterSubmissionValidationRulesRepository->find($id);

        if (empty($masterSubmissionValidationRules)) {
            Flash::error('Master Submission Validation Rules not found');

            return redirect(route('masters.masterSubmissionValidationRules.index'));
        }

        return view('masters.master_submission_validation_rules.show')->with('masterSubmissionValidationRules', $masterSubmissionValidationRules);
    }

    /**
     * Show the form for editing the specified MasterSubmissionValidationRules.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterSubmissionValidationRules = $this->masterSubmissionValidationRulesRepository->find($id);

        if (empty($masterSubmissionValidationRules)) {
            Flash::error('Master Submission Validation Rules not found');

            return redirect(route('masters.masterSubmissionValidationRules.index'));
        }

        return view('masters.master_submission_validation_rules.edit')->with('masterSubmissionValidationRules', $masterSubmissionValidationRules);
    }

    /**
     * Update the specified MasterSubmissionValidationRules in storage.
     *
     * @param int $id
     * @param UpdateMasterSubmissionValidationRulesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterSubmissionValidationRulesRequest $request)
    {
        $masterSubmissionValidationRules = $this->masterSubmissionValidationRulesRepository->find($id);

        if (empty($masterSubmissionValidationRules)) {
            Flash::error('Master Submission Validation Rules not found');

            return redirect(route('masters.masterSubmissionValidationRules.index'));
        }

        $masterSubmissionValidationRules = $this->masterSubmissionValidationRulesRepository->update($request->all(), $id);

        Flash::success('Master Submission Validation Rules updated successfully.');

        return redirect(route('masters.masterSubmissionValidationRules.index'));
    }

    /**
     * Remove the specified MasterSubmissionValidationRules from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterSubmissionValidationRules = $this->masterSubmissionValidationRulesRepository->find($id);

        if (empty($masterSubmissionValidationRules)) {
            Flash::error('Master Submission Validation Rules not found');

            return redirect(route('masters.masterSubmissionValidationRules.index'));
        }

        $this->masterSubmissionValidationRulesRepository->delete($id);

        Flash::success('Master Submission Validation Rules deleted successfully.');

        return redirect(route('masters.masterSubmissionValidationRules.index'));
    }
}
