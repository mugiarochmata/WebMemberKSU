<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterCitiesRequest;
use App\Http\Requests\Masters\UpdateMasterCitiesRequest;
use App\Repositories\Masters\MasterCitiesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterCitiesController extends AppBaseController
{
    /** @var  MasterCitiesRepository */
    private $masterCitiesRepository;

    public function __construct(MasterCitiesRepository $masterCitiesRepo)
    {
        $this->masterCitiesRepository = $masterCitiesRepo;
    }

    /**
     * Display a listing of the MasterCities.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterCities = $this->masterCitiesRepository->paginate(20);

        return view('masters.master_cities.index')
            ->with('masterCities', $masterCities);
    }

    /**
     * Show the form for creating a new MasterCities.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_cities.create');
    }

    /**
     * Store a newly created MasterCities in storage.
     *
     * @param CreateMasterCitiesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterCitiesRequest $request)
    {
        $input = $request->all();

        $masterCities = $this->masterCitiesRepository->create($input);

        Flash::success('Master Cities saved successfully.');

        return redirect(route('masters.masterCities.index'));
    }

    /**
     * Display the specified MasterCities.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterCities = $this->masterCitiesRepository->find($id);

        if (empty($masterCities)) {
            Flash::error('Master Cities not found');

            return redirect(route('masters.masterCities.index'));
        }

        return view('masters.master_cities.show')->with('masterCities', $masterCities);
    }

    /**
     * Show the form for editing the specified MasterCities.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterCities = $this->masterCitiesRepository->find($id);

        if (empty($masterCities)) {
            Flash::error('Master Cities not found');

            return redirect(route('masters.masterCities.index'));
        }

        return view('masters.master_cities.edit')->with('masterCities', $masterCities);
    }

    /**
     * Update the specified MasterCities in storage.
     *
     * @param int $id
     * @param UpdateMasterCitiesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterCitiesRequest $request)
    {
        $masterCities = $this->masterCitiesRepository->find($id);

        if (empty($masterCities)) {
            Flash::error('Master Cities not found');

            return redirect(route('masters.masterCities.index'));
        }

        $masterCities = $this->masterCitiesRepository->update($request->all(), $id);

        Flash::success('Master Cities updated successfully.');

        return redirect(route('masters.masterCities.index'));
    }

    /**
     * Remove the specified MasterCities from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterCities = $this->masterCitiesRepository->find($id);

        if (empty($masterCities)) {
            Flash::error('Master Cities not found');

            return redirect(route('masters.masterCities.index'));
        }

        $this->masterCitiesRepository->delete($id);

        Flash::success('Master Cities deleted successfully.');

        return redirect(route('masters.masterCities.index'));
    }
}
