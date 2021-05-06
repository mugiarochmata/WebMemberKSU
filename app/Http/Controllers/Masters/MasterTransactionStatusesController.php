<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterTransactionStatusesRequest;
use App\Http\Requests\Masters\UpdateMasterTransactionStatusesRequest;
use App\Repositories\Masters\MasterTransactionStatusesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterTransactionStatusesController extends AppBaseController
{
    /** @var  MasterTransactionStatusesRepository */
    private $masterTransactionStatusesRepository;

    public function __construct(MasterTransactionStatusesRepository $masterTransactionStatusesRepo)
    {
        $this->masterTransactionStatusesRepository = $masterTransactionStatusesRepo;
    }

    /**
     * Display a listing of the MasterTransactionStatuses.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterTransactionStatuses = $this->masterTransactionStatusesRepository->paginate(20);

        return view('masters.master_transaction_statuses.index')
            ->with('masterTransactionStatuses', $masterTransactionStatuses);
    }

    /**
     * Show the form for creating a new MasterTransactionStatuses.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_transaction_statuses.create');
    }

    /**
     * Store a newly created MasterTransactionStatuses in storage.
     *
     * @param CreateMasterTransactionStatusesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterTransactionStatusesRequest $request)
    {
        $input = $request->all();

        $masterTransactionStatuses = $this->masterTransactionStatusesRepository->create($input);

        Flash::success('Master Transaction Statuses saved successfully.');

        return redirect(route('masters.masterTransactionStatuses.index'));
    }

    /**
     * Display the specified MasterTransactionStatuses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterTransactionStatuses = $this->masterTransactionStatusesRepository->find($id);

        if (empty($masterTransactionStatuses)) {
            Flash::error('Master Transaction Statuses not found');

            return redirect(route('masters.masterTransactionStatuses.index'));
        }

        return view('masters.master_transaction_statuses.show')->with('masterTransactionStatuses', $masterTransactionStatuses);
    }

    /**
     * Show the form for editing the specified MasterTransactionStatuses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterTransactionStatuses = $this->masterTransactionStatusesRepository->find($id);

        if (empty($masterTransactionStatuses)) {
            Flash::error('Master Transaction Statuses not found');

            return redirect(route('masters.masterTransactionStatuses.index'));
        }

        return view('masters.master_transaction_statuses.edit')->with('masterTransactionStatuses', $masterTransactionStatuses);
    }

    /**
     * Update the specified MasterTransactionStatuses in storage.
     *
     * @param int $id
     * @param UpdateMasterTransactionStatusesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterTransactionStatusesRequest $request)
    {
        $masterTransactionStatuses = $this->masterTransactionStatusesRepository->find($id);

        if (empty($masterTransactionStatuses)) {
            Flash::error('Master Transaction Statuses not found');

            return redirect(route('masters.masterTransactionStatuses.index'));
        }

        $masterTransactionStatuses = $this->masterTransactionStatusesRepository->update($request->all(), $id);

        Flash::success('Master Transaction Statuses updated successfully.');

        return redirect(route('masters.masterTransactionStatuses.index'));
    }

    /**
     * Remove the specified MasterTransactionStatuses from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterTransactionStatuses = $this->masterTransactionStatusesRepository->find($id);

        if (empty($masterTransactionStatuses)) {
            Flash::error('Master Transaction Statuses not found');

            return redirect(route('masters.masterTransactionStatuses.index'));
        }

        $this->masterTransactionStatusesRepository->delete($id);

        Flash::success('Master Transaction Statuses deleted successfully.');

        return redirect(route('masters.masterTransactionStatuses.index'));
    }
}
