<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterLoanProcessingTypesRequest;
use App\Http\Requests\Masters\UpdateMasterLoanProcessingTypesRequest;
use App\Repositories\Masters\MasterLoanProcessingTypesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterLoanProcessingTypesController extends AppBaseController
{
    /** @var  MasterLoanProcessingTypesRepository */
    private $masterLoanProcessingTypesRepository;

    public function __construct(MasterLoanProcessingTypesRepository $masterLoanProcessingTypesRepo)
    {
        $this->masterLoanProcessingTypesRepository = $masterLoanProcessingTypesRepo;
    }

    /**
     * Display a listing of the MasterLoanProcessingTypes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterLoanProcessingTypes = $this->masterLoanProcessingTypesRepository->paginate(20);

        return view('masters.master_loan_processing_types.index')
            ->with('masterLoanProcessingTypes', $masterLoanProcessingTypes);
    }

    /**
     * Show the form for creating a new MasterLoanProcessingTypes.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_loan_processing_types.create');
    }

    /**
     * Store a newly created MasterLoanProcessingTypes in storage.
     *
     * @param CreateMasterLoanProcessingTypesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterLoanProcessingTypesRequest $request)
    {
        $input = $request->all();

        $masterLoanProcessingTypes = $this->masterLoanProcessingTypesRepository->create($input);

        Flash::success('Master Loan Processing Types saved successfully.');

        return redirect(route('masters.masterLoanProcessingTypes.index'));
    }

    /**
     * Display the specified MasterLoanProcessingTypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterLoanProcessingTypes = $this->masterLoanProcessingTypesRepository->find($id);

        if (empty($masterLoanProcessingTypes)) {
            Flash::error('Master Loan Processing Types not found');

            return redirect(route('masters.masterLoanProcessingTypes.index'));
        }

        return view('masters.master_loan_processing_types.show')->with('masterLoanProcessingTypes', $masterLoanProcessingTypes);
    }

    /**
     * Show the form for editing the specified MasterLoanProcessingTypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterLoanProcessingTypes = $this->masterLoanProcessingTypesRepository->find($id);

        if (empty($masterLoanProcessingTypes)) {
            Flash::error('Master Loan Processing Types not found');

            return redirect(route('masters.masterLoanProcessingTypes.index'));
        }

        return view('masters.master_loan_processing_types.edit')->with('masterLoanProcessingTypes', $masterLoanProcessingTypes);
    }

    /**
     * Update the specified MasterLoanProcessingTypes in storage.
     *
     * @param int $id
     * @param UpdateMasterLoanProcessingTypesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterLoanProcessingTypesRequest $request)
    {
        $masterLoanProcessingTypes = $this->masterLoanProcessingTypesRepository->find($id);

        if (empty($masterLoanProcessingTypes)) {
            Flash::error('Master Loan Processing Types not found');

            return redirect(route('masters.masterLoanProcessingTypes.index'));
        }

        $masterLoanProcessingTypes = $this->masterLoanProcessingTypesRepository->update($request->all(), $id);

        Flash::success('Master Loan Processing Types updated successfully.');

        return redirect(route('masters.masterLoanProcessingTypes.index'));
    }

    /**
     * Remove the specified MasterLoanProcessingTypes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterLoanProcessingTypes = $this->masterLoanProcessingTypesRepository->find($id);

        if (empty($masterLoanProcessingTypes)) {
            Flash::error('Master Loan Processing Types not found');

            return redirect(route('masters.masterLoanProcessingTypes.index'));
        }

        $this->masterLoanProcessingTypesRepository->delete($id);

        Flash::success('Master Loan Processing Types deleted successfully.');

        return redirect(route('masters.masterLoanProcessingTypes.index'));
    }
}
