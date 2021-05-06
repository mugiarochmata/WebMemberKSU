<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterProductLoanKindsRequest;
use App\Http\Requests\Masters\UpdateMasterProductLoanKindsRequest;
use App\Repositories\Masters\MasterProductLoanKindsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterProductLoanKindsController extends AppBaseController
{
    /** @var  MasterProductLoanKindsRepository */
    private $masterProductLoanKindsRepository;

    public function __construct(MasterProductLoanKindsRepository $masterProductLoanKindsRepo)
    {
        $this->masterProductLoanKindsRepository = $masterProductLoanKindsRepo;
    }

    /**
     * Display a listing of the MasterProductLoanKinds.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterProductLoanKinds = $this->masterProductLoanKindsRepository->paginate(20);

        return view('masters.master_product_loan_kinds.index')
            ->with('masterProductLoanKinds', $masterProductLoanKinds);
    }

    /**
     * Show the form for creating a new MasterProductLoanKinds.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_product_loan_kinds.create');
    }

    /**
     * Store a newly created MasterProductLoanKinds in storage.
     *
     * @param CreateMasterProductLoanKindsRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterProductLoanKindsRequest $request)
    {
        $input = $request->all();

        $masterProductLoanKinds = $this->masterProductLoanKindsRepository->create($input);

        Flash::success('Master Product Loan Kinds saved successfully.');

        return redirect(route('masters.masterProductLoanKinds.index'));
    }

    /**
     * Display the specified MasterProductLoanKinds.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterProductLoanKinds = $this->masterProductLoanKindsRepository->find($id);

        if (empty($masterProductLoanKinds)) {
            Flash::error('Master Product Loan Kinds not found');

            return redirect(route('masters.masterProductLoanKinds.index'));
        }

        return view('masters.master_product_loan_kinds.show')->with('masterProductLoanKinds', $masterProductLoanKinds);
    }

    /**
     * Show the form for editing the specified MasterProductLoanKinds.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterProductLoanKinds = $this->masterProductLoanKindsRepository->find($id);

        if (empty($masterProductLoanKinds)) {
            Flash::error('Master Product Loan Kinds not found');

            return redirect(route('masters.masterProductLoanKinds.index'));
        }

        return view('masters.master_product_loan_kinds.edit')->with('masterProductLoanKinds', $masterProductLoanKinds);
    }

    /**
     * Update the specified MasterProductLoanKinds in storage.
     *
     * @param int $id
     * @param UpdateMasterProductLoanKindsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterProductLoanKindsRequest $request)
    {
        $masterProductLoanKinds = $this->masterProductLoanKindsRepository->find($id);

        if (empty($masterProductLoanKinds)) {
            Flash::error('Master Product Loan Kinds not found');

            return redirect(route('masters.masterProductLoanKinds.index'));
        }

        $masterProductLoanKinds = $this->masterProductLoanKindsRepository->update($request->all(), $id);

        Flash::success('Master Product Loan Kinds updated successfully.');

        return redirect(route('masters.masterProductLoanKinds.index'));
    }

    /**
     * Remove the specified MasterProductLoanKinds from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterProductLoanKinds = $this->masterProductLoanKindsRepository->find($id);

        if (empty($masterProductLoanKinds)) {
            Flash::error('Master Product Loan Kinds not found');

            return redirect(route('masters.masterProductLoanKinds.index'));
        }

        $this->masterProductLoanKindsRepository->delete($id);

        Flash::success('Master Product Loan Kinds deleted successfully.');

        return redirect(route('masters.masterProductLoanKinds.index'));
    }
}
