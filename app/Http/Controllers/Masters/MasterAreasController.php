<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterAreasRequest;
use App\Http\Requests\Masters\UpdateMasterAreasRequest;
use App\Repositories\Masters\MasterAreasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterAreasController extends AppBaseController
{
    /** @var  MasterAreasRepository */
    private $masterAreasRepository;

    public function __construct(MasterAreasRepository $masterAreasRepo)
    {
        $this->masterAreasRepository = $masterAreasRepo;
    }

    /**
     * Display a listing of the MasterAreas.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterAreas = $this->masterAreasRepository->paginate(20);

        return view('masters.master_areas.index')
            ->with('masterAreas', $masterAreas);
    }

    /**
     * Show the form for creating a new MasterAreas.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_areas.create');
    }

    /**
     * Store a newly created MasterAreas in storage.
     *
     * @param CreateMasterAreasRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterAreasRequest $request)
    {
        $input = $request->all();

        $masterAreas = $this->masterAreasRepository->create($input);

        Flash::success('Master Areas saved successfully.');

        return redirect(route('masters.masterAreas.index'));
    }

    /**
     * Display the specified MasterAreas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterAreas = $this->masterAreasRepository->find($id);

        if (empty($masterAreas)) {
            Flash::error('Master Areas not found');

            return redirect(route('masters.masterAreas.index'));
        }

        return view('masters.master_areas.show')->with('masterAreas', $masterAreas);
    }

    /**
     * Show the form for editing the specified MasterAreas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterAreas = $this->masterAreasRepository->find($id);

        if (empty($masterAreas)) {
            Flash::error('Master Areas not found');

            return redirect(route('masters.masterAreas.index'));
        }

        return view('masters.master_areas.edit')->with('masterAreas', $masterAreas);
    }

    /**
     * Update the specified MasterAreas in storage.
     *
     * @param int $id
     * @param UpdateMasterAreasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterAreasRequest $request)
    {
        $masterAreas = $this->masterAreasRepository->find($id);

        if (empty($masterAreas)) {
            Flash::error('Master Areas not found');

            return redirect(route('masters.masterAreas.index'));
        }

        $masterAreas = $this->masterAreasRepository->update($request->all(), $id);

        Flash::success('Master Areas updated successfully.');

        return redirect(route('masters.masterAreas.index'));
    }

    /**
     * Remove the specified MasterAreas from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterAreas = $this->masterAreasRepository->find($id);

        if (empty($masterAreas)) {
            Flash::error('Master Areas not found');

            return redirect(route('masters.masterAreas.index'));
        }

        $this->masterAreasRepository->delete($id);

        Flash::success('Master Areas deleted successfully.');

        return redirect(route('masters.masterAreas.index'));
    }
}
