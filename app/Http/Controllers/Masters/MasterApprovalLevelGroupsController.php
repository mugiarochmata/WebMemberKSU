<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterApprovalLevelGroupsRequest;
use App\Http\Requests\Masters\UpdateMasterApprovalLevelGroupsRequest;
use App\Repositories\Masters\MasterApprovalLevelGroupsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterApprovalLevelGroupsController extends AppBaseController
{
    /** @var  MasterApprovalLevelGroupsRepository */
    private $masterApprovalLevelGroupsRepository;

    public function __construct(MasterApprovalLevelGroupsRepository $masterApprovalLevelGroupsRepo)
    {
        $this->masterApprovalLevelGroupsRepository = $masterApprovalLevelGroupsRepo;
    }

    /**
     * Display a listing of the MasterApprovalLevelGroups.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterApprovalLevelGroups = $this->masterApprovalLevelGroupsRepository->paginate(20);

        return view('masters.master_approval_level_groups.index')
            ->with('masterApprovalLevelGroups', $masterApprovalLevelGroups);
    }

    /**
     * Show the form for creating a new MasterApprovalLevelGroups.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_approval_level_groups.create');
    }

    /**
     * Store a newly created MasterApprovalLevelGroups in storage.
     *
     * @param CreateMasterApprovalLevelGroupsRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterApprovalLevelGroupsRequest $request)
    {
        $input = $request->all();

        $masterApprovalLevelGroups = $this->masterApprovalLevelGroupsRepository->create($input);

        Flash::success('Master Approval Level Groups saved successfully.');

        return redirect(route('masters.masterApprovalLevelGroups.index'));
    }

    /**
     * Display the specified MasterApprovalLevelGroups.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterApprovalLevelGroups = $this->masterApprovalLevelGroupsRepository->find($id);

        if (empty($masterApprovalLevelGroups)) {
            Flash::error('Master Approval Level Groups not found');

            return redirect(route('masters.masterApprovalLevelGroups.index'));
        }

        return view('masters.master_approval_level_groups.show')->with('masterApprovalLevelGroups', $masterApprovalLevelGroups);
    }

    /**
     * Show the form for editing the specified MasterApprovalLevelGroups.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterApprovalLevelGroups = $this->masterApprovalLevelGroupsRepository->find($id);

        if (empty($masterApprovalLevelGroups)) {
            Flash::error('Master Approval Level Groups not found');

            return redirect(route('masters.masterApprovalLevelGroups.index'));
        }

        return view('masters.master_approval_level_groups.edit')->with('masterApprovalLevelGroups', $masterApprovalLevelGroups);
    }

    /**
     * Update the specified MasterApprovalLevelGroups in storage.
     *
     * @param int $id
     * @param UpdateMasterApprovalLevelGroupsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterApprovalLevelGroupsRequest $request)
    {
        $masterApprovalLevelGroups = $this->masterApprovalLevelGroupsRepository->find($id);

        if (empty($masterApprovalLevelGroups)) {
            Flash::error('Master Approval Level Groups not found');

            return redirect(route('masters.masterApprovalLevelGroups.index'));
        }

        $masterApprovalLevelGroups = $this->masterApprovalLevelGroupsRepository->update($request->all(), $id);

        Flash::success('Master Approval Level Groups updated successfully.');

        return redirect(route('masters.masterApprovalLevelGroups.index'));
    }

    /**
     * Remove the specified MasterApprovalLevelGroups from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterApprovalLevelGroups = $this->masterApprovalLevelGroupsRepository->find($id);

        if (empty($masterApprovalLevelGroups)) {
            Flash::error('Master Approval Level Groups not found');

            return redirect(route('masters.masterApprovalLevelGroups.index'));
        }

        $this->masterApprovalLevelGroupsRepository->delete($id);

        Flash::success('Master Approval Level Groups deleted successfully.');

        return redirect(route('masters.masterApprovalLevelGroups.index'));
    }
}
