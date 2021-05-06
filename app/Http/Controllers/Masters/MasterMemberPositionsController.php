<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterMemberPositionsRequest;
use App\Http\Requests\Masters\UpdateMasterMemberPositionsRequest;
use App\Repositories\Masters\MasterMemberPositionsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterMemberPositionsController extends AppBaseController
{
    /** @var  MasterMemberPositionsRepository */
    private $masterMemberPositionsRepository;

    public function __construct(MasterMemberPositionsRepository $masterMemberPositionsRepo)
    {
        $this->masterMemberPositionsRepository = $masterMemberPositionsRepo;
    }

    /**
     * Display a listing of the MasterMemberPositions.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterMemberPositions = $this->masterMemberPositionsRepository->paginate(20);

        return view('masters.master_member_positions.index')
            ->with('masterMemberPositions', $masterMemberPositions);
    }

    /**
     * Show the form for creating a new MasterMemberPositions.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_member_positions.create');
    }

    /**
     * Store a newly created MasterMemberPositions in storage.
     *
     * @param CreateMasterMemberPositionsRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterMemberPositionsRequest $request)
    {
        $input = $request->all();

        $masterMemberPositions = $this->masterMemberPositionsRepository->create($input);

        Flash::success('Master Member Positions saved successfully.');

        return redirect(route('masters.masterMemberPositions.index'));
    }

    /**
     * Display the specified MasterMemberPositions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterMemberPositions = $this->masterMemberPositionsRepository->find($id);

        if (empty($masterMemberPositions)) {
            Flash::error('Master Member Positions not found');

            return redirect(route('masters.masterMemberPositions.index'));
        }

        return view('masters.master_member_positions.show')->with('masterMemberPositions', $masterMemberPositions);
    }

    /**
     * Show the form for editing the specified MasterMemberPositions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterMemberPositions = $this->masterMemberPositionsRepository->find($id);

        if (empty($masterMemberPositions)) {
            Flash::error('Master Member Positions not found');

            return redirect(route('masters.masterMemberPositions.index'));
        }

        return view('masters.master_member_positions.edit')->with('masterMemberPositions', $masterMemberPositions);
    }

    /**
     * Update the specified MasterMemberPositions in storage.
     *
     * @param int $id
     * @param UpdateMasterMemberPositionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterMemberPositionsRequest $request)
    {
        $masterMemberPositions = $this->masterMemberPositionsRepository->find($id);

        if (empty($masterMemberPositions)) {
            Flash::error('Master Member Positions not found');

            return redirect(route('masters.masterMemberPositions.index'));
        }

        $masterMemberPositions = $this->masterMemberPositionsRepository->update($request->all(), $id);

        Flash::success('Master Member Positions updated successfully.');

        return redirect(route('masters.masterMemberPositions.index'));
    }

    /**
     * Remove the specified MasterMemberPositions from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterMemberPositions = $this->masterMemberPositionsRepository->find($id);

        if (empty($masterMemberPositions)) {
            Flash::error('Master Member Positions not found');

            return redirect(route('masters.masterMemberPositions.index'));
        }

        $this->masterMemberPositionsRepository->delete($id);

        Flash::success('Master Member Positions deleted successfully.');

        return redirect(route('masters.masterMemberPositions.index'));
    }
}
