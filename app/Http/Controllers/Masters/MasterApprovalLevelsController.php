<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterApprovalLevelsRequest;
use App\Http\Requests\Masters\UpdateMasterApprovalLevelsRequest;
use App\Repositories\Masters\MasterApprovalLevelsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterApprovalLevelsController extends AppBaseController
{
    /** @var  MasterApprovalLevelsRepository */
    private $masterApprovalLevelsRepository;

    public function __construct(MasterApprovalLevelsRepository $masterApprovalLevelsRepo)
    {
        $this->masterApprovalLevelsRepository = $masterApprovalLevelsRepo;
    }

    /**
     * Display a listing of the MasterApprovalLevels.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterApprovalLevels = $this->masterApprovalLevelsRepository->paginate(20);

        return view('masters.master_approval_levels.index')
            ->with('masterApprovalLevels', $masterApprovalLevels);
    }

    /**
     * Show the form for creating a new MasterApprovalLevels.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_approval_levels.create');
    }

    /**
     * Store a newly created MasterApprovalLevels in storage.
     *
     * @param CreateMasterApprovalLevelsRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterApprovalLevelsRequest $request)
    {
        $input = $request->all();

        $masterApprovalLevels = $this->masterApprovalLevelsRepository->create($input);

        Flash::success('Master Approval Levels saved successfully.');

        return redirect(route('masters.masterApprovalLevels.index'));
    }

    /**
     * Display the specified MasterApprovalLevels.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterApprovalLevels = $this->masterApprovalLevelsRepository->find($id);

        if (empty($masterApprovalLevels)) {
            Flash::error('Master Approval Levels not found');

            return redirect(route('masters.masterApprovalLevels.index'));
        }

        return view('masters.master_approval_levels.show')->with('masterApprovalLevels', $masterApprovalLevels);
    }

    /**
     * Show the form for editing the specified MasterApprovalLevels.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterApprovalLevels = $this->masterApprovalLevelsRepository->find($id);

        if (empty($masterApprovalLevels)) {
            Flash::error('Master Approval Levels not found');

            return redirect(route('masters.masterApprovalLevels.index'));
        }

        return view('masters.master_approval_levels.edit')->with('masterApprovalLevels', $masterApprovalLevels);
    }

    /**
     * Update the specified MasterApprovalLevels in storage.
     *
     * @param int $id
     * @param UpdateMasterApprovalLevelsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterApprovalLevelsRequest $request)
    {
        $masterApprovalLevels = $this->masterApprovalLevelsRepository->find($id);

        if (empty($masterApprovalLevels)) {
            Flash::error('Master Approval Levels not found');

            return redirect(route('masters.masterApprovalLevels.index'));
        }

        $masterApprovalLevels = $this->masterApprovalLevelsRepository->update($request->all(), $id);

        Flash::success('Master Approval Levels updated successfully.');

        return redirect(route('masters.masterApprovalLevels.index'));
    }

    /**
     * Remove the specified MasterApprovalLevels from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterApprovalLevels = $this->masterApprovalLevelsRepository->find($id);

        if (empty($masterApprovalLevels)) {
            Flash::error('Master Approval Levels not found');

            return redirect(route('masters.masterApprovalLevels.index'));
        }

        $this->masterApprovalLevelsRepository->delete($id);

        Flash::success('Master Approval Levels deleted successfully.');

        return redirect(route('masters.masterApprovalLevels.index'));
    }
}
