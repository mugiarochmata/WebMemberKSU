<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterBanksRequest;
use App\Http\Requests\Masters\UpdateMasterBanksRequest;
use App\Repositories\Masters\MasterBanksRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterBanksController extends AppBaseController
{
    /** @var  MasterBanksRepository */
    private $masterBanksRepository;

    public function __construct(MasterBanksRepository $masterBanksRepo)
    {
        $this->masterBanksRepository = $masterBanksRepo;
    }

    /**
     * Display a listing of the MasterBanks.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterBanks = $this->masterBanksRepository->paginate(20);

        return view('masters.master_banks.index')
            ->with('masterBanks', $masterBanks);
    }

    /**
     * Show the form for creating a new MasterBanks.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_banks.create');
    }

    /**
     * Store a newly created MasterBanks in storage.
     *
     * @param CreateMasterBanksRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterBanksRequest $request)
    {
        $input = $request->all();

        $masterBanks = $this->masterBanksRepository->create($input);

        Flash::success('Master Banks saved successfully.');

        return redirect(route('masters.masterBanks.index'));
    }

    /**
     * Display the specified MasterBanks.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterBanks = $this->masterBanksRepository->find($id);

        if (empty($masterBanks)) {
            Flash::error('Master Banks not found');

            return redirect(route('masters.masterBanks.index'));
        }

        return view('masters.master_banks.show')->with('masterBanks', $masterBanks);
    }

    /**
     * Show the form for editing the specified MasterBanks.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterBanks = $this->masterBanksRepository->find($id);

        if (empty($masterBanks)) {
            Flash::error('Master Banks not found');

            return redirect(route('masters.masterBanks.index'));
        }

        return view('masters.master_banks.edit')->with('masterBanks', $masterBanks);
    }

    /**
     * Update the specified MasterBanks in storage.
     *
     * @param int $id
     * @param UpdateMasterBanksRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterBanksRequest $request)
    {
        $masterBanks = $this->masterBanksRepository->find($id);

        if (empty($masterBanks)) {
            Flash::error('Master Banks not found');

            return redirect(route('masters.masterBanks.index'));
        }

        $masterBanks = $this->masterBanksRepository->update($request->all(), $id);

        Flash::success('Master Banks updated successfully.');

        return redirect(route('masters.masterBanks.index'));
    }

    /**
     * Remove the specified MasterBanks from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterBanks = $this->masterBanksRepository->find($id);

        if (empty($masterBanks)) {
            Flash::error('Master Banks not found');

            return redirect(route('masters.masterBanks.index'));
        }

        $this->masterBanksRepository->delete($id);

        Flash::success('Master Banks deleted successfully.');

        return redirect(route('masters.masterBanks.index'));
    }
}
