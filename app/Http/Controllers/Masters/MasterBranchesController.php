<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterBranchesRequest;
use App\Http\Requests\Masters\UpdateMasterBranchesRequest;
use App\Repositories\Masters\MasterBranchesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterBranchesController extends AppBaseController
{
    /** @var  MasterBranchesRepository */
    private $masterBranchesRepository;

    public function __construct(MasterBranchesRepository $masterBranchesRepo)
    {
        $this->masterBranchesRepository = $masterBranchesRepo;
    }

    /**
     * Display a listing of the MasterBranches.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterBranches = $this->masterBranchesRepository->paginate(20);

        return view('masters.master_branches.index')
            ->with('masterBranches', $masterBranches);
    }

    /**
     * Show the form for creating a new MasterBranches.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_branches.create');
    }

    /**
     * Store a newly created MasterBranches in storage.
     *
     * @param CreateMasterBranchesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterBranchesRequest $request)
    {
        $input = $request->all();

        $masterBranches = $this->masterBranchesRepository->create($input);

        Flash::success('Master Branches saved successfully.');

        return redirect(route('masters.masterBranches.index'));
    }

    /**
     * Display the specified MasterBranches.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterBranches = $this->masterBranchesRepository->find($id);

        if (empty($masterBranches)) {
            Flash::error('Master Branches not found');

            return redirect(route('masters.masterBranches.index'));
        }

        return view('masters.master_branches.show')->with('masterBranches', $masterBranches);
    }

    /**
     * Show the form for editing the specified MasterBranches.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterBranches = $this->masterBranchesRepository->find($id);

        if (empty($masterBranches)) {
            Flash::error('Master Branches not found');

            return redirect(route('masters.masterBranches.index'));
        }

        return view('masters.master_branches.edit')->with('masterBranches', $masterBranches);
    }

    /**
     * Update the specified MasterBranches in storage.
     *
     * @param int $id
     * @param UpdateMasterBranchesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterBranchesRequest $request)
    {
        $masterBranches = $this->masterBranchesRepository->find($id);

        if (empty($masterBranches)) {
            Flash::error('Master Branches not found');

            return redirect(route('masters.masterBranches.index'));
        }

        $masterBranches = $this->masterBranchesRepository->update($request->all(), $id);

        Flash::success('Master Branches updated successfully.');

        return redirect(route('masters.masterBranches.index'));
    }

    /**
     * Remove the specified MasterBranches from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterBranches = $this->masterBranchesRepository->find($id);

        if (empty($masterBranches)) {
            Flash::error('Master Branches not found');

            return redirect(route('masters.masterBranches.index'));
        }

        $this->masterBranchesRepository->delete($id);

        Flash::success('Master Branches deleted successfully.');

        return redirect(route('masters.masterBranches.index'));
    }
}
