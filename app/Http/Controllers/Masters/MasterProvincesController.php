<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterProvincesRequest;
use App\Http\Requests\Masters\UpdateMasterProvincesRequest;
use App\Repositories\Masters\MasterProvincesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterProvincesController extends AppBaseController
{
    /** @var  MasterProvincesRepository */
    private $masterProvincesRepository;

    public function __construct(MasterProvincesRepository $masterProvincesRepo)
    {
        $this->masterProvincesRepository = $masterProvincesRepo;
    }

    /**
     * Display a listing of the MasterProvinces.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterProvinces = $this->masterProvincesRepository->paginate(20);

        return view('masters.master_provinces.index')
            ->with('masterProvinces', $masterProvinces);
    }

    /**
     * Show the form for creating a new MasterProvinces.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_provinces.create');
    }

    /**
     * Store a newly created MasterProvinces in storage.
     *
     * @param CreateMasterProvincesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterProvincesRequest $request)
    {
        $input = $request->all();

        $masterProvinces = $this->masterProvincesRepository->create($input);

        Flash::success('Master Provinces saved successfully.');

        return redirect(route('masters.masterProvinces.index'));
    }

    /**
     * Display the specified MasterProvinces.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterProvinces = $this->masterProvincesRepository->find($id);

        if (empty($masterProvinces)) {
            Flash::error('Master Provinces not found');

            return redirect(route('masters.masterProvinces.index'));
        }

        return view('masters.master_provinces.show')->with('masterProvinces', $masterProvinces);
    }

    /**
     * Show the form for editing the specified MasterProvinces.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterProvinces = $this->masterProvincesRepository->find($id);

        if (empty($masterProvinces)) {
            Flash::error('Master Provinces not found');

            return redirect(route('masters.masterProvinces.index'));
        }

        return view('masters.master_provinces.edit')->with('masterProvinces', $masterProvinces);
    }

    /**
     * Update the specified MasterProvinces in storage.
     *
     * @param int $id
     * @param UpdateMasterProvincesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterProvincesRequest $request)
    {
        $masterProvinces = $this->masterProvincesRepository->find($id);

        if (empty($masterProvinces)) {
            Flash::error('Master Provinces not found');

            return redirect(route('masters.masterProvinces.index'));
        }

        $masterProvinces = $this->masterProvincesRepository->update($request->all(), $id);

        Flash::success('Master Provinces updated successfully.');

        return redirect(route('masters.masterProvinces.index'));
    }

    /**
     * Remove the specified MasterProvinces from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterProvinces = $this->masterProvincesRepository->find($id);

        if (empty($masterProvinces)) {
            Flash::error('Master Provinces not found');

            return redirect(route('masters.masterProvinces.index'));
        }

        $this->masterProvincesRepository->delete($id);

        Flash::success('Master Provinces deleted successfully.');

        return redirect(route('masters.masterProvinces.index'));
    }
}
