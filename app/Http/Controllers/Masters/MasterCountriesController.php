<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterCountriesRequest;
use App\Http\Requests\Masters\UpdateMasterCountriesRequest;
use App\Repositories\Masters\MasterCountriesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterCountriesController extends AppBaseController
{
    /** @var  MasterCountriesRepository */
    private $masterCountriesRepository;

    public function __construct(MasterCountriesRepository $masterCountriesRepo)
    {
        $this->masterCountriesRepository = $masterCountriesRepo;
    }

    /**
     * Display a listing of the MasterCountries.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterCountries = $this->masterCountriesRepository->paginate(20);

        return view('masters.master_countries.index')
            ->with('masterCountries', $masterCountries);
    }

    /**
     * Show the form for creating a new MasterCountries.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_countries.create');
    }

    /**
     * Store a newly created MasterCountries in storage.
     *
     * @param CreateMasterCountriesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterCountriesRequest $request)
    {
        $input = $request->all();

        $masterCountries = $this->masterCountriesRepository->create($input);

        Flash::success('Master Countries saved successfully.');

        return redirect(route('masters.masterCountries.index'));
    }

    /**
     * Display the specified MasterCountries.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterCountries = $this->masterCountriesRepository->find($id);

        if (empty($masterCountries)) {
            Flash::error('Master Countries not found');

            return redirect(route('masters.masterCountries.index'));
        }

        return view('masters.master_countries.show')->with('masterCountries', $masterCountries);
    }

    /**
     * Show the form for editing the specified MasterCountries.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterCountries = $this->masterCountriesRepository->find($id);

        if (empty($masterCountries)) {
            Flash::error('Master Countries not found');

            return redirect(route('masters.masterCountries.index'));
        }

        return view('masters.master_countries.edit')->with('masterCountries', $masterCountries);
    }

    /**
     * Update the specified MasterCountries in storage.
     *
     * @param int $id
     * @param UpdateMasterCountriesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterCountriesRequest $request)
    {
        $masterCountries = $this->masterCountriesRepository->find($id);

        if (empty($masterCountries)) {
            Flash::error('Master Countries not found');

            return redirect(route('masters.masterCountries.index'));
        }

        $masterCountries = $this->masterCountriesRepository->update($request->all(), $id);

        Flash::success('Master Countries updated successfully.');

        return redirect(route('masters.masterCountries.index'));
    }

    /**
     * Remove the specified MasterCountries from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterCountries = $this->masterCountriesRepository->find($id);

        if (empty($masterCountries)) {
            Flash::error('Master Countries not found');

            return redirect(route('masters.masterCountries.index'));
        }

        $this->masterCountriesRepository->delete($id);

        Flash::success('Master Countries deleted successfully.');

        return redirect(route('masters.masterCountries.index'));
    }
}
