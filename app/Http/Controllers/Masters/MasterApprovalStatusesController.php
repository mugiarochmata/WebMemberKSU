<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterApprovalStatusesRequest;
use App\Http\Requests\Masters\UpdateMasterApprovalStatusesRequest;
use App\Repositories\Masters\MasterApprovalStatusesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterApprovalStatusesController extends AppBaseController
{
    /** @var  MasterApprovalStatusesRepository */
    private $masterApprovalStatusesRepository;

    public function __construct(MasterApprovalStatusesRepository $masterApprovalStatusesRepo)
    {
        $this->masterApprovalStatusesRepository = $masterApprovalStatusesRepo;
    }

    /**
     * Display a listing of the MasterApprovalStatuses.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterApprovalStatuses = $this->masterApprovalStatusesRepository->paginate(20);

        return view('masters.master_approval_statuses.index')
            ->with('masterApprovalStatuses', $masterApprovalStatuses);
    }

    /**
     * Show the form for creating a new MasterApprovalStatuses.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_approval_statuses.create');
    }

    /**
     * Store a newly created MasterApprovalStatuses in storage.
     *
     * @param CreateMasterApprovalStatusesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterApprovalStatusesRequest $request)
    {
        $input = $request->all();

        $masterApprovalStatuses = $this->masterApprovalStatusesRepository->create($input);

        Flash::success('Master Approval Statuses saved successfully.');

        return redirect(route('masters.masterApprovalStatuses.index'));
    }

    /**
     * Display the specified MasterApprovalStatuses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterApprovalStatuses = $this->masterApprovalStatusesRepository->find($id);

        if (empty($masterApprovalStatuses)) {
            Flash::error('Master Approval Statuses not found');

            return redirect(route('masters.masterApprovalStatuses.index'));
        }

        return view('masters.master_approval_statuses.show')->with('masterApprovalStatuses', $masterApprovalStatuses);
    }

    /**
     * Show the form for editing the specified MasterApprovalStatuses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterApprovalStatuses = $this->masterApprovalStatusesRepository->find($id);

        if (empty($masterApprovalStatuses)) {
            Flash::error('Master Approval Statuses not found');

            return redirect(route('masters.masterApprovalStatuses.index'));
        }

        return view('masters.master_approval_statuses.edit')->with('masterApprovalStatuses', $masterApprovalStatuses);
    }

    /**
     * Update the specified MasterApprovalStatuses in storage.
     *
     * @param int $id
     * @param UpdateMasterApprovalStatusesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterApprovalStatusesRequest $request)
    {
        $masterApprovalStatuses = $this->masterApprovalStatusesRepository->find($id);

        if (empty($masterApprovalStatuses)) {
            Flash::error('Master Approval Statuses not found');

            return redirect(route('masters.masterApprovalStatuses.index'));
        }

        $masterApprovalStatuses = $this->masterApprovalStatusesRepository->update($request->all(), $id);

        Flash::success('Master Approval Statuses updated successfully.');

        return redirect(route('masters.masterApprovalStatuses.index'));
    }

    /**
     * Remove the specified MasterApprovalStatuses from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterApprovalStatuses = $this->masterApprovalStatusesRepository->find($id);

        if (empty($masterApprovalStatuses)) {
            Flash::error('Master Approval Statuses not found');

            return redirect(route('masters.masterApprovalStatuses.index'));
        }

        $this->masterApprovalStatusesRepository->delete($id);

        Flash::success('Master Approval Statuses deleted successfully.');

        return redirect(route('masters.masterApprovalStatuses.index'));
    }
}
