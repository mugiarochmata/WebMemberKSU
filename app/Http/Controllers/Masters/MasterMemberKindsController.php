<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterMemberKindsRequest;
use App\Http\Requests\Masters\UpdateMasterMemberKindsRequest;
use App\Repositories\Masters\MasterMemberKindsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterMemberKindsController extends AppBaseController
{
    /** @var  MasterMemberKindsRepository */
    private $masterMemberKindsRepository;

    public function __construct(MasterMemberKindsRepository $masterMemberKindsRepo)
    {
        $this->masterMemberKindsRepository = $masterMemberKindsRepo;
    }

    /**
     * Display a listing of the MasterMemberKinds.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterMemberKinds = $this->masterMemberKindsRepository->paginate(20);

        return view('masters.master_member_kinds.index')
            ->with('masterMemberKinds', $masterMemberKinds);
    }

    /**
     * Show the form for creating a new MasterMemberKinds.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_member_kinds.create');
    }

    /**
     * Store a newly created MasterMemberKinds in storage.
     *
     * @param CreateMasterMemberKindsRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterMemberKindsRequest $request)
    {
        $input = $request->all();

        $masterMemberKinds = $this->masterMemberKindsRepository->create($input);

        Flash::success('Master Member Kinds saved successfully.');

        return redirect(route('masters.masterMemberKinds.index'));
    }

    /**
     * Display the specified MasterMemberKinds.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterMemberKinds = $this->masterMemberKindsRepository->find($id);

        if (empty($masterMemberKinds)) {
            Flash::error('Master Member Kinds not found');

            return redirect(route('masters.masterMemberKinds.index'));
        }

        return view('masters.master_member_kinds.show')->with('masterMemberKinds', $masterMemberKinds);
    }

    /**
     * Show the form for editing the specified MasterMemberKinds.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterMemberKinds = $this->masterMemberKindsRepository->find($id);

        if (empty($masterMemberKinds)) {
            Flash::error('Master Member Kinds not found');

            return redirect(route('masters.masterMemberKinds.index'));
        }

        return view('masters.master_member_kinds.edit')->with('masterMemberKinds', $masterMemberKinds);
    }

    /**
     * Update the specified MasterMemberKinds in storage.
     *
     * @param int $id
     * @param UpdateMasterMemberKindsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterMemberKindsRequest $request)
    {
        $masterMemberKinds = $this->masterMemberKindsRepository->find($id);

        if (empty($masterMemberKinds)) {
            Flash::error('Master Member Kinds not found');

            return redirect(route('masters.masterMemberKinds.index'));
        }

        $masterMemberKinds = $this->masterMemberKindsRepository->update($request->all(), $id);

        Flash::success('Master Member Kinds updated successfully.');

        return redirect(route('masters.masterMemberKinds.index'));
    }

    /**
     * Remove the specified MasterMemberKinds from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterMemberKinds = $this->masterMemberKindsRepository->find($id);

        if (empty($masterMemberKinds)) {
            Flash::error('Master Member Kinds not found');

            return redirect(route('masters.masterMemberKinds.index'));
        }

        $this->masterMemberKindsRepository->delete($id);

        Flash::success('Master Member Kinds deleted successfully.');

        return redirect(route('masters.masterMemberKinds.index'));
    }
}
