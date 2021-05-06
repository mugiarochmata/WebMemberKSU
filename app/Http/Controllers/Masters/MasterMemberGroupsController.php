<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterMemberGroupsRequest;
use App\Http\Requests\Masters\UpdateMasterMemberGroupsRequest;
use App\Repositories\Masters\MasterMemberGroupsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterMemberGroupsController extends AppBaseController
{
    /** @var  MasterMemberGroupsRepository */
    private $masterMemberGroupsRepository;

    public function __construct(MasterMemberGroupsRepository $masterMemberGroupsRepo)
    {
        $this->masterMemberGroupsRepository = $masterMemberGroupsRepo;
    }

    /**
     * Display a listing of the MasterMemberGroups.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterMemberGroups = $this->masterMemberGroupsRepository->paginate(20);

        return view('masters.master_member_groups.index')
            ->with('masterMemberGroups', $masterMemberGroups);
    }

    /**
     * Show the form for creating a new MasterMemberGroups.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_member_groups.create');
    }

    /**
     * Store a newly created MasterMemberGroups in storage.
     *
     * @param CreateMasterMemberGroupsRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterMemberGroupsRequest $request)
    {
        $input = $request->all();

        $masterMemberGroups = $this->masterMemberGroupsRepository->create($input);

        Flash::success('Master Member Groups saved successfully.');

        return redirect(route('masters.masterMemberGroups.index'));
    }

    /**
     * Display the specified MasterMemberGroups.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterMemberGroups = $this->masterMemberGroupsRepository->find($id);

        if (empty($masterMemberGroups)) {
            Flash::error('Master Member Groups not found');

            return redirect(route('masters.masterMemberGroups.index'));
        }

        return view('masters.master_member_groups.show')->with('masterMemberGroups', $masterMemberGroups);
    }

    /**
     * Show the form for editing the specified MasterMemberGroups.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterMemberGroups = $this->masterMemberGroupsRepository->find($id);

        if (empty($masterMemberGroups)) {
            Flash::error('Master Member Groups not found');

            return redirect(route('masters.masterMemberGroups.index'));
        }

        return view('masters.master_member_groups.edit')->with('masterMemberGroups', $masterMemberGroups);
    }

    /**
     * Update the specified MasterMemberGroups in storage.
     *
     * @param int $id
     * @param UpdateMasterMemberGroupsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterMemberGroupsRequest $request)
    {
        $masterMemberGroups = $this->masterMemberGroupsRepository->find($id);

        if (empty($masterMemberGroups)) {
            Flash::error('Master Member Groups not found');

            return redirect(route('masters.masterMemberGroups.index'));
        }

        $masterMemberGroups = $this->masterMemberGroupsRepository->update($request->all(), $id);

        Flash::success('Master Member Groups updated successfully.');

        return redirect(route('masters.masterMemberGroups.index'));
    }

    /**
     * Remove the specified MasterMemberGroups from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterMemberGroups = $this->masterMemberGroupsRepository->find($id);

        if (empty($masterMemberGroups)) {
            Flash::error('Master Member Groups not found');

            return redirect(route('masters.masterMemberGroups.index'));
        }

        $this->masterMemberGroupsRepository->delete($id);

        Flash::success('Master Member Groups deleted successfully.');

        return redirect(route('masters.masterMemberGroups.index'));
    }
}
