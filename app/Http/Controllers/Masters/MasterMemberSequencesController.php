<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterMemberSequencesRequest;
use App\Http\Requests\Masters\UpdateMasterMemberSequencesRequest;
use App\Repositories\Masters\MasterMemberSequencesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterMemberSequencesController extends AppBaseController
{
    /** @var  MasterMemberSequencesRepository */
    private $masterMemberSequencesRepository;

    public function __construct(MasterMemberSequencesRepository $masterMemberSequencesRepo)
    {
        $this->masterMemberSequencesRepository = $masterMemberSequencesRepo;
    }

    /**
     * Display a listing of the MasterMemberSequences.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterMemberSequences = $this->masterMemberSequencesRepository->paginate(20);

        return view('masters.master_member_sequences.index')
            ->with('masterMemberSequences', $masterMemberSequences);
    }

    /**
     * Show the form for creating a new MasterMemberSequences.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_member_sequences.create');
    }

    /**
     * Store a newly created MasterMemberSequences in storage.
     *
     * @param CreateMasterMemberSequencesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterMemberSequencesRequest $request)
    {
        $input = $request->all();

        $masterMemberSequences = $this->masterMemberSequencesRepository->create($input);

        Flash::success('Master Member Sequences saved successfully.');

        return redirect(route('masters.masterMemberSequences.index'));
    }

    /**
     * Display the specified MasterMemberSequences.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterMemberSequences = $this->masterMemberSequencesRepository->find($id);

        if (empty($masterMemberSequences)) {
            Flash::error('Master Member Sequences not found');

            return redirect(route('masters.masterMemberSequences.index'));
        }

        return view('masters.master_member_sequences.show')->with('masterMemberSequences', $masterMemberSequences);
    }

    /**
     * Show the form for editing the specified MasterMemberSequences.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterMemberSequences = $this->masterMemberSequencesRepository->find($id);

        if (empty($masterMemberSequences)) {
            Flash::error('Master Member Sequences not found');

            return redirect(route('masters.masterMemberSequences.index'));
        }

        return view('masters.master_member_sequences.edit')->with('masterMemberSequences', $masterMemberSequences);
    }

    /**
     * Update the specified MasterMemberSequences in storage.
     *
     * @param int $id
     * @param UpdateMasterMemberSequencesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterMemberSequencesRequest $request)
    {
        $masterMemberSequences = $this->masterMemberSequencesRepository->find($id);

        if (empty($masterMemberSequences)) {
            Flash::error('Master Member Sequences not found');

            return redirect(route('masters.masterMemberSequences.index'));
        }

        $masterMemberSequences = $this->masterMemberSequencesRepository->update($request->all(), $id);

        Flash::success('Master Member Sequences updated successfully.');

        return redirect(route('masters.masterMemberSequences.index'));
    }

    /**
     * Remove the specified MasterMemberSequences from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterMemberSequences = $this->masterMemberSequencesRepository->find($id);

        if (empty($masterMemberSequences)) {
            Flash::error('Master Member Sequences not found');

            return redirect(route('masters.masterMemberSequences.index'));
        }

        $this->masterMemberSequencesRepository->delete($id);

        Flash::success('Master Member Sequences deleted successfully.');

        return redirect(route('masters.masterMemberSequences.index'));
    }
}
