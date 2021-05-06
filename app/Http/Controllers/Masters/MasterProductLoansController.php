<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterProductLoansRequest;
use App\Http\Requests\Masters\UpdateMasterProductLoansRequest;
use App\Repositories\Masters\MasterProductLoansRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterProductLoansController extends AppBaseController
{
    /** @var  MasterProductLoansRepository */
    private $masterProductLoansRepository;

    public function __construct(MasterProductLoansRepository $masterProductLoansRepo)
    {
        $this->masterProductLoansRepository = $masterProductLoansRepo;
    }

    /**
     * Display a listing of the MasterProductLoans.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterProductLoans = $this->masterProductLoansRepository->paginate(20);

        return view('masters.master_product_loans.index')
            ->with('masterProductLoans', $masterProductLoans);
    }

    /**
     * Show the form for creating a new MasterProductLoans.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_product_loans.create');
    }

    /**
     * Store a newly created MasterProductLoans in storage.
     *
     * @param CreateMasterProductLoansRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterProductLoansRequest $request)
    {
        $input = $request->all();

        $masterProductLoans = $this->masterProductLoansRepository->create($input);

        Flash::success('Master Product Loans saved successfully.');

        return redirect(route('masters.masterProductLoans.index'));
    }

    /**
     * Display the specified MasterProductLoans.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterProductLoans = $this->masterProductLoansRepository->find($id);

        if (empty($masterProductLoans)) {
            Flash::error('Master Product Loans not found');

            return redirect(route('masters.masterProductLoans.index'));
        }

        return view('masters.master_product_loans.show')->with('masterProductLoans', $masterProductLoans);
    }

    /**
     * Show the form for editing the specified MasterProductLoans.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterProductLoans = $this->masterProductLoansRepository->find($id);

        if (empty($masterProductLoans)) {
            Flash::error('Master Product Loans not found');

            return redirect(route('masters.masterProductLoans.index'));
        }

        return view('masters.master_product_loans.edit')->with('masterProductLoans', $masterProductLoans);
    }

    /**
     * Update the specified MasterProductLoans in storage.
     *
     * @param int $id
     * @param UpdateMasterProductLoansRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterProductLoansRequest $request)
    {
        $masterProductLoans = $this->masterProductLoansRepository->find($id);

        if (empty($masterProductLoans)) {
            Flash::error('Master Product Loans not found');

            return redirect(route('masters.masterProductLoans.index'));
        }

        $masterProductLoans = $this->masterProductLoansRepository->update($request->all(), $id);

        Flash::success('Master Product Loans updated successfully.');

        return redirect(route('masters.masterProductLoans.index'));
    }

    /**
     * Remove the specified MasterProductLoans from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterProductLoans = $this->masterProductLoansRepository->find($id);

        if (empty($masterProductLoans)) {
            Flash::error('Master Product Loans not found');

            return redirect(route('masters.masterProductLoans.index'));
        }

        $this->masterProductLoansRepository->delete($id);

        Flash::success('Master Product Loans deleted successfully.');

        return redirect(route('masters.masterProductLoans.index'));
    }
}
