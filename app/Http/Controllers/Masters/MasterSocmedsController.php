<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterSocmedsRequest;
use App\Http\Requests\Masters\UpdateMasterSocmedsRequest;
use App\Repositories\Masters\MasterSocmedsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterSocmedsController extends AppBaseController
{
    /** @var  MasterSocmedsRepository */
    private $masterSocmedsRepository;

    public function __construct(MasterSocmedsRepository $masterSocmedsRepo)
    {
        $this->masterSocmedsRepository = $masterSocmedsRepo;
    }

    /**
     * Display a listing of the MasterSocmeds.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterSocmeds = $this->masterSocmedsRepository->paginate(20);

        return view('masters.master_socmeds.index')
            ->with('masterSocmeds', $masterSocmeds);
    }

    /**
     * Show the form for creating a new MasterSocmeds.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_socmeds.create');
    }

    /**
     * Store a newly created MasterSocmeds in storage.
     *
     * @param CreateMasterSocmedsRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterSocmedsRequest $request)
    {
        $input = $request->all();

        $masterSocmeds = $this->masterSocmedsRepository->create($input);

        Flash::success('Master Socmeds saved successfully.');

        return redirect(route('masters.masterSocmeds.index'));
    }

    /**
     * Display the specified MasterSocmeds.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterSocmeds = $this->masterSocmedsRepository->find($id);

        if (empty($masterSocmeds)) {
            Flash::error('Master Socmeds not found');

            return redirect(route('masters.masterSocmeds.index'));
        }

        return view('masters.master_socmeds.show')->with('masterSocmeds', $masterSocmeds);
    }

    /**
     * Show the form for editing the specified MasterSocmeds.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterSocmeds = $this->masterSocmedsRepository->find($id);

        if (empty($masterSocmeds)) {
            Flash::error('Master Socmeds not found');

            return redirect(route('masters.masterSocmeds.index'));
        }

        return view('masters.master_socmeds.edit')->with('masterSocmeds', $masterSocmeds);
    }

    /**
     * Update the specified MasterSocmeds in storage.
     *
     * @param int $id
     * @param UpdateMasterSocmedsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterSocmedsRequest $request)
    {
        $masterSocmeds = $this->masterSocmedsRepository->find($id);

        if (empty($masterSocmeds)) {
            Flash::error('Master Socmeds not found');

            return redirect(route('masters.masterSocmeds.index'));
        }

        $masterSocmeds = $this->masterSocmedsRepository->update($request->all(), $id);

        Flash::success('Master Socmeds updated successfully.');

        return redirect(route('masters.masterSocmeds.index'));
    }

    /**
     * Remove the specified MasterSocmeds from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterSocmeds = $this->masterSocmedsRepository->find($id);

        if (empty($masterSocmeds)) {
            Flash::error('Master Socmeds not found');

            return redirect(route('masters.masterSocmeds.index'));
        }

        $this->masterSocmedsRepository->delete($id);

        Flash::success('Master Socmeds deleted successfully.');

        return redirect(route('masters.masterSocmeds.index'));
    }
}
