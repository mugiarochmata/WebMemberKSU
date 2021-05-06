<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterSubmissionValidationParametersRequest;
use App\Http\Requests\Masters\UpdateMasterSubmissionValidationParametersRequest;
use App\Repositories\Masters\MasterSubmissionValidationParametersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterSubmissionValidationController extends AppBaseController
{
    /** @var  MasterSubmissionValidationParametersRepository */
    private $masterSubmissionValidationParametersRepository;

    public function __construct(MasterSubmissionValidationParametersRepository $masterSubmissionValidationParametersRepo)
    {
        $this->masterSubmissionValidationParametersRepository = $masterSubmissionValidationParametersRepo;
    }

    /**
     * Display a listing of the MasterSubmissionValidationParameters.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterSubmissionValidationParameters = $this->masterSubmissionValidationParametersRepository->paginate(20);

        return view('masters.master_submission_validation_parameters.index')
            ->with('masterSubmissionValidationParameters', $masterSubmissionValidationParameters);
    }

    /**
     * Show the form for creating a new MasterSubmissionValidationParameters.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_submission_validation_parameters.create');
    }

    /**
     * Store a newly created MasterSubmissionValidationParameters in storage.
     *
     * @param CreateMasterSubmissionValidationParametersRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterSubmissionValidationParametersRequest $request)
    {
        $input = $request->all();

        $masterSubmissionValidationParameters = $this->masterSubmissionValidationParametersRepository->create($input);

        Flash::success('Master Submission Validation Parameters saved successfully.');

        return redirect(route('masters.masterSubmissionValidationParameters.index'));
    }

    /**
     * Display the specified MasterSubmissionValidationParameters.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterSubmissionValidationParameters = $this->masterSubmissionValidationParametersRepository->find($id);

        if (empty($masterSubmissionValidationParameters)) {
            Flash::error('Master Submission Validation Parameters not found');

            return redirect(route('masters.masterSubmissionValidationParameters.index'));
        }

        return view('masters.master_submission_validation_parameters.show')->with('masterSubmissionValidationParameters', $masterSubmissionValidationParameters);
    }

    /**
     * Show the form for editing the specified MasterSubmissionValidationParameters.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterSubmissionValidationParameters = $this->masterSubmissionValidationParametersRepository->find($id);

        if (empty($masterSubmissionValidationParameters)) {
            Flash::error('Master Submission Validation Parameters not found');

            return redirect(route('masters.masterSubmissionValidationParameters.index'));
        }

        return view('masters.master_submission_validation_parameters.edit')->with('masterSubmissionValidationParameters', $masterSubmissionValidationParameters);
    }

    /**
     * Update the specified MasterSubmissionValidationParameters in storage.
     *
     * @param int $id
     * @param UpdateMasterSubmissionValidationParametersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterSubmissionValidationParametersRequest $request)
    {
        $masterSubmissionValidationParameters = $this->masterSubmissionValidationParametersRepository->find($id);

        if (empty($masterSubmissionValidationParameters)) {
            Flash::error('Master Submission Validation Parameters not found');

            return redirect(route('masters.masterSubmissionValidationParameters.index'));
        }

        $masterSubmissionValidationParameters = $this->masterSubmissionValidationParametersRepository->update($request->all(), $id);

        Flash::success('Master Submission Validation Parameters updated successfully.');

        return redirect(route('masters.masterSubmissionValidationParameters.index'));
    }

    /**
     * Remove the specified MasterSubmissionValidationParameters from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterSubmissionValidationParameters = $this->masterSubmissionValidationParametersRepository->find($id);

        if (empty($masterSubmissionValidationParameters)) {
            Flash::error('Master Submission Validation Parameters not found');

            return redirect(route('masters.masterSubmissionValidationParameters.index'));
        }

        $this->masterSubmissionValidationParametersRepository->delete($id);

        Flash::success('Master Submission Validation Parameters deleted successfully.');

        return redirect(route('masters.masterSubmissionValidationParameters.index'));
    }
}
