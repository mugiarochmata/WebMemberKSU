<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterMemberStatusesRequest;
use App\Http\Requests\Masters\UpdateMasterMemberStatusesRequest;
use App\Repositories\Masters\MasterMemberStatusesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterMemberStatusesController extends AppBaseController
{
    /** @var  MasterMemberStatusesRepository */
    private $masterMemberStatusesRepository;

    public function __construct(MasterMemberStatusesRepository $masterMemberStatusesRepo)
    {
        $this->masterMemberStatusesRepository = $masterMemberStatusesRepo;
    }

    /**
     * Display a listing of the MasterMemberStatuses.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterMemberStatuses = $this->masterMemberStatusesRepository->paginate(20);

        return view('masters.master_member_statuses.index')
            ->with('masterMemberStatuses', $masterMemberStatuses);
    }

    /**
     * Show the form for creating a new MasterMemberStatuses.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_member_statuses.create');
    }

    /**
     * Store a newly created MasterMemberStatuses in storage.
     *
     * @param CreateMasterMemberStatusesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterMemberStatusesRequest $request)
    {
        $input = $request->all();

        $masterMemberStatuses = $this->masterMemberStatusesRepository->create($input);

        Flash::success('Master Member Statuses saved successfully.');

        return redirect(route('masters.masterMemberStatuses.index'));
    }

    /**
     * Display the specified MasterMemberStatuses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterMemberStatuses = $this->masterMemberStatusesRepository->find($id);

        if (empty($masterMemberStatuses)) {
            Flash::error('Master Member Statuses not found');

            return redirect(route('masters.masterMemberStatuses.index'));
        }

        return view('masters.master_member_statuses.show')->with('masterMemberStatuses', $masterMemberStatuses);
    }

    /**
     * Show the form for editing the specified MasterMemberStatuses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterMemberStatuses = $this->masterMemberStatusesRepository->find($id);

        if (empty($masterMemberStatuses)) {
            Flash::error('Master Member Statuses not found');

            return redirect(route('masters.masterMemberStatuses.index'));
        }

        return view('masters.master_member_statuses.edit')->with('masterMemberStatuses', $masterMemberStatuses);
    }

    /**
     * Update the specified MasterMemberStatuses in storage.
     *
     * @param int $id
     * @param UpdateMasterMemberStatusesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterMemberStatusesRequest $request)
    {
        $masterMemberStatuses = $this->masterMemberStatusesRepository->find($id);

        if (empty($masterMemberStatuses)) {
            Flash::error('Master Member Statuses not found');

            return redirect(route('masters.masterMemberStatuses.index'));
        }

        $masterMemberStatuses = $this->masterMemberStatusesRepository->update($request->all(), $id);

        Flash::success('Master Member Statuses updated successfully.');

        return redirect(route('masters.masterMemberStatuses.index'));
    }

    /**
     * Remove the specified MasterMemberStatuses from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterMemberStatuses = $this->masterMemberStatusesRepository->find($id);

        if (empty($masterMemberStatuses)) {
            Flash::error('Master Member Statuses not found');

            return redirect(route('masters.masterMemberStatuses.index'));
        }

        $this->masterMemberStatusesRepository->delete($id);

        Flash::success('Master Member Statuses deleted successfully.');

        return redirect(route('masters.masterMemberStatuses.index'));
    }
}
