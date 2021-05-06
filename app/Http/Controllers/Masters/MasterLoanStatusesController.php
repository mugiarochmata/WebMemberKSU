<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterLoanStatusesRequest;
use App\Http\Requests\Masters\UpdateMasterLoanStatusesRequest;
use App\Repositories\Masters\MasterLoanStatusesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterLoanStatusesController extends AppBaseController
{
    /** @var  MasterLoanStatusesRepository */
    private $masterLoanStatusesRepository;

    public function __construct(MasterLoanStatusesRepository $masterLoanStatusesRepo)
    {
        $this->masterLoanStatusesRepository = $masterLoanStatusesRepo;
    }

    /**
     * Display a listing of the MasterLoanStatuses.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterLoanStatuses = $this->masterLoanStatusesRepository->paginate(20);

        return view('masters.master_loan_statuses.index')
            ->with('masterLoanStatuses', $masterLoanStatuses);
    }

    /**
     * Show the form for creating a new MasterLoanStatuses.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_loan_statuses.create');
    }

    /**
     * Store a newly created MasterLoanStatuses in storage.
     *
     * @param CreateMasterLoanStatusesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterLoanStatusesRequest $request)
    {
        $input = $request->all();

        $masterLoanStatuses = $this->masterLoanStatusesRepository->create($input);

        Flash::success('Master Loan Statuses saved successfully.');

        return redirect(route('masters.masterLoanStatuses.index'));
    }

    /**
     * Display the specified MasterLoanStatuses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterLoanStatuses = $this->masterLoanStatusesRepository->find($id);

        if (empty($masterLoanStatuses)) {
            Flash::error('Master Loan Statuses not found');

            return redirect(route('masters.masterLoanStatuses.index'));
        }

        return view('masters.master_loan_statuses.show')->with('masterLoanStatuses', $masterLoanStatuses);
    }

    /**
     * Show the form for editing the specified MasterLoanStatuses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterLoanStatuses = $this->masterLoanStatusesRepository->find($id);

        if (empty($masterLoanStatuses)) {
            Flash::error('Master Loan Statuses not found');

            return redirect(route('masters.masterLoanStatuses.index'));
        }

        return view('masters.master_loan_statuses.edit')->with('masterLoanStatuses', $masterLoanStatuses);
    }

    /**
     * Update the specified MasterLoanStatuses in storage.
     *
     * @param int $id
     * @param UpdateMasterLoanStatusesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterLoanStatusesRequest $request)
    {
        $masterLoanStatuses = $this->masterLoanStatusesRepository->find($id);

        if (empty($masterLoanStatuses)) {
            Flash::error('Master Loan Statuses not found');

            return redirect(route('masters.masterLoanStatuses.index'));
        }

        $masterLoanStatuses = $this->masterLoanStatusesRepository->update($request->all(), $id);

        Flash::success('Master Loan Statuses updated successfully.');

        return redirect(route('masters.masterLoanStatuses.index'));
    }

    /**
     * Remove the specified MasterLoanStatuses from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterLoanStatuses = $this->masterLoanStatusesRepository->find($id);

        if (empty($masterLoanStatuses)) {
            Flash::error('Master Loan Statuses not found');

            return redirect(route('masters.masterLoanStatuses.index'));
        }

        $this->masterLoanStatusesRepository->delete($id);

        Flash::success('Master Loan Statuses deleted successfully.');

        return redirect(route('masters.masterLoanStatuses.index'));
    }
}
