<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterNationalitiesRequest;
use App\Http\Requests\Masters\UpdateMasterNationalitiesRequest;
use App\Repositories\Masters\MasterNationalitiesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterNationalitiesController extends AppBaseController
{
    /** @var  MasterNationalitiesRepository */
    private $masterNationalitiesRepository;

    public function __construct(MasterNationalitiesRepository $masterNationalitiesRepo)
    {
        $this->masterNationalitiesRepository = $masterNationalitiesRepo;
    }

    /**
     * Display a listing of the MasterNationalities.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterNationalities = $this->masterNationalitiesRepository->paginate(20);

        return view('masters.master_nationalities.index')
            ->with('masterNationalities', $masterNationalities);
    }

    /**
     * Show the form for creating a new MasterNationalities.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_nationalities.create');
    }

    /**
     * Store a newly created MasterNationalities in storage.
     *
     * @param CreateMasterNationalitiesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterNationalitiesRequest $request)
    {
        $input = $request->all();

        $masterNationalities = $this->masterNationalitiesRepository->create($input);

        Flash::success('Master Nationalities saved successfully.');

        return redirect(route('masters.masterNationalities.index'));
    }

    /**
     * Display the specified MasterNationalities.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterNationalities = $this->masterNationalitiesRepository->find($id);

        if (empty($masterNationalities)) {
            Flash::error('Master Nationalities not found');

            return redirect(route('masters.masterNationalities.index'));
        }

        return view('masters.master_nationalities.show')->with('masterNationalities', $masterNationalities);
    }

    /**
     * Show the form for editing the specified MasterNationalities.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterNationalities = $this->masterNationalitiesRepository->find($id);

        if (empty($masterNationalities)) {
            Flash::error('Master Nationalities not found');

            return redirect(route('masters.masterNationalities.index'));
        }

        return view('masters.master_nationalities.edit')->with('masterNationalities', $masterNationalities);
    }

    /**
     * Update the specified MasterNationalities in storage.
     *
     * @param int $id
     * @param UpdateMasterNationalitiesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterNationalitiesRequest $request)
    {
        $masterNationalities = $this->masterNationalitiesRepository->find($id);

        if (empty($masterNationalities)) {
            Flash::error('Master Nationalities not found');

            return redirect(route('masters.masterNationalities.index'));
        }

        $masterNationalities = $this->masterNationalitiesRepository->update($request->all(), $id);

        Flash::success('Master Nationalities updated successfully.');

        return redirect(route('masters.masterNationalities.index'));
    }

    /**
     * Remove the specified MasterNationalities from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterNationalities = $this->masterNationalitiesRepository->find($id);

        if (empty($masterNationalities)) {
            Flash::error('Master Nationalities not found');

            return redirect(route('masters.masterNationalities.index'));
        }

        $this->masterNationalitiesRepository->delete($id);

        Flash::success('Master Nationalities deleted successfully.');

        return redirect(route('masters.masterNationalities.index'));
    }
}
