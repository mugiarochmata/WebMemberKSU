<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterProductLoanRulesRequest;
use App\Http\Requests\Masters\UpdateMasterProductLoanRulesRequest;
use App\Repositories\Masters\MasterProductLoanRulesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterProductLoanRulesController extends AppBaseController
{
    /** @var  MasterProductLoanRulesRepository */
    private $masterProductLoanRulesRepository;

    public function __construct(MasterProductLoanRulesRepository $masterProductLoanRulesRepo)
    {
        $this->masterProductLoanRulesRepository = $masterProductLoanRulesRepo;
    }

    /**
     * Display a listing of the MasterProductLoanRules.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterProductLoanRules = $this->masterProductLoanRulesRepository->paginate(20);

        return view('masters.master_product_loan_rules.index')
            ->with('masterProductLoanRules', $masterProductLoanRules);
    }

    /**
     * Show the form for creating a new MasterProductLoanRules.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_product_loan_rules.create');
    }

    /**
     * Store a newly created MasterProductLoanRules in storage.
     *
     * @param CreateMasterProductLoanRulesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterProductLoanRulesRequest $request)
    {
        $input = $request->all();

        $masterProductLoanRules = $this->masterProductLoanRulesRepository->create($input);

        Flash::success('Master Product Loan Rules saved successfully.');

        return redirect(route('masters.masterProductLoanRules.index'));
    }

    /**
     * Display the specified MasterProductLoanRules.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterProductLoanRules = $this->masterProductLoanRulesRepository->find($id);

        if (empty($masterProductLoanRules)) {
            Flash::error('Master Product Loan Rules not found');

            return redirect(route('masters.masterProductLoanRules.index'));
        }

        return view('masters.master_product_loan_rules.show')->with('masterProductLoanRules', $masterProductLoanRules);
    }

    /**
     * Show the form for editing the specified MasterProductLoanRules.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterProductLoanRules = $this->masterProductLoanRulesRepository->find($id);

        if (empty($masterProductLoanRules)) {
            Flash::error('Master Product Loan Rules not found');

            return redirect(route('masters.masterProductLoanRules.index'));
        }

        return view('masters.master_product_loan_rules.edit')->with('masterProductLoanRules', $masterProductLoanRules);
    }

    /**
     * Update the specified MasterProductLoanRules in storage.
     *
     * @param int $id
     * @param UpdateMasterProductLoanRulesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterProductLoanRulesRequest $request)
    {
        $masterProductLoanRules = $this->masterProductLoanRulesRepository->find($id);

        if (empty($masterProductLoanRules)) {
            Flash::error('Master Product Loan Rules not found');

            return redirect(route('masters.masterProductLoanRules.index'));
        }

        $masterProductLoanRules = $this->masterProductLoanRulesRepository->update($request->all(), $id);

        Flash::success('Master Product Loan Rules updated successfully.');

        return redirect(route('masters.masterProductLoanRules.index'));
    }

    /**
     * Remove the specified MasterProductLoanRules from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterProductLoanRules = $this->masterProductLoanRulesRepository->find($id);

        if (empty($masterProductLoanRules)) {
            Flash::error('Master Product Loan Rules not found');

            return redirect(route('masters.masterProductLoanRules.index'));
        }

        $this->masterProductLoanRulesRepository->delete($id);

        Flash::success('Master Product Loan Rules deleted successfully.');

        return redirect(route('masters.masterProductLoanRules.index'));
    }
}
