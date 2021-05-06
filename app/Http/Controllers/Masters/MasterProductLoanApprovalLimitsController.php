<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterProductLoanApprovalLimitsRequest;
use App\Http\Requests\Masters\UpdateMasterProductLoanApprovalLimitsRequest;
use App\Repositories\Masters\MasterProductLoanApprovalLimitsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterProductLoanApprovalLimitsController extends AppBaseController
{
    /** @var  MasterProductLoanApprovalLimitsRepository */
    private $masterProductLoanApprovalLimitsRepository;

    public function __construct(MasterProductLoanApprovalLimitsRepository $masterProductLoanApprovalLimitsRepo)
    {
        $this->masterProductLoanApprovalLimitsRepository = $masterProductLoanApprovalLimitsRepo;
    }

    /**
     * Display a listing of the MasterProductLoanApprovalLimits.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterProductLoanApprovalLimits = $this->masterProductLoanApprovalLimitsRepository->paginate(20);

        return view('masters.master_product_loan_approval_limits.index')
            ->with('masterProductLoanApprovalLimits', $masterProductLoanApprovalLimits);
    }

    /**
     * Show the form for creating a new MasterProductLoanApprovalLimits.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_product_loan_approval_limits.create');
    }

    /**
     * Store a newly created MasterProductLoanApprovalLimits in storage.
     *
     * @param CreateMasterProductLoanApprovalLimitsRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterProductLoanApprovalLimitsRequest $request)
    {
        $input = $request->all();

        $masterProductLoanApprovalLimits = $this->masterProductLoanApprovalLimitsRepository->create($input);

        Flash::success('Master Product Loan Approval Limits saved successfully.');

        return redirect(route('masters.masterProductLoanApprovalLimits.index'));
    }

    /**
     * Display the specified MasterProductLoanApprovalLimits.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterProductLoanApprovalLimits = $this->masterProductLoanApprovalLimitsRepository->find($id);

        if (empty($masterProductLoanApprovalLimits)) {
            Flash::error('Master Product Loan Approval Limits not found');

            return redirect(route('masters.masterProductLoanApprovalLimits.index'));
        }

        return view('masters.master_product_loan_approval_limits.show')->with('masterProductLoanApprovalLimits', $masterProductLoanApprovalLimits);
    }

    /**
     * Show the form for editing the specified MasterProductLoanApprovalLimits.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterProductLoanApprovalLimits = $this->masterProductLoanApprovalLimitsRepository->find($id);

        if (empty($masterProductLoanApprovalLimits)) {
            Flash::error('Master Product Loan Approval Limits not found');

            return redirect(route('masters.masterProductLoanApprovalLimits.index'));
        }

        return view('masters.master_product_loan_approval_limits.edit')->with('masterProductLoanApprovalLimits', $masterProductLoanApprovalLimits);
    }

    /**
     * Update the specified MasterProductLoanApprovalLimits in storage.
     *
     * @param int $id
     * @param UpdateMasterProductLoanApprovalLimitsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterProductLoanApprovalLimitsRequest $request)
    {
        $masterProductLoanApprovalLimits = $this->masterProductLoanApprovalLimitsRepository->find($id);

        if (empty($masterProductLoanApprovalLimits)) {
            Flash::error('Master Product Loan Approval Limits not found');

            return redirect(route('masters.masterProductLoanApprovalLimits.index'));
        }

        $masterProductLoanApprovalLimits = $this->masterProductLoanApprovalLimitsRepository->update($request->all(), $id);

        Flash::success('Master Product Loan Approval Limits updated successfully.');

        return redirect(route('masters.masterProductLoanApprovalLimits.index'));
    }

    /**
     * Remove the specified MasterProductLoanApprovalLimits from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterProductLoanApprovalLimits = $this->masterProductLoanApprovalLimitsRepository->find($id);

        if (empty($masterProductLoanApprovalLimits)) {
            Flash::error('Master Product Loan Approval Limits not found');

            return redirect(route('masters.masterProductLoanApprovalLimits.index'));
        }

        $this->masterProductLoanApprovalLimitsRepository->delete($id);

        Flash::success('Master Product Loan Approval Limits deleted successfully.');

        return redirect(route('masters.masterProductLoanApprovalLimits.index'));
    }
}
