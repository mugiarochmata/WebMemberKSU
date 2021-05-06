<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterIdentityTypesRequest;
use App\Http\Requests\Masters\UpdateMasterIdentityTypesRequest;
use App\Repositories\Masters\MasterIdentityTypesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterIdentityTypesController extends AppBaseController
{
    /** @var  MasterIdentityTypesRepository */
    private $masterIdentityTypesRepository;

    public function __construct(MasterIdentityTypesRepository $masterIdentityTypesRepo)
    {
        $this->masterIdentityTypesRepository = $masterIdentityTypesRepo;
    }

    /**
     * Display a listing of the MasterIdentityTypes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterIdentityTypes = $this->masterIdentityTypesRepository->paginate(20);

        return view('masters.master_identity_types.index')
            ->with('masterIdentityTypes', $masterIdentityTypes);
    }

    /**
     * Show the form for creating a new MasterIdentityTypes.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_identity_types.create');
    }

    /**
     * Store a newly created MasterIdentityTypes in storage.
     *
     * @param CreateMasterIdentityTypesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterIdentityTypesRequest $request)
    {
        $input = $request->all();

        $masterIdentityTypes = $this->masterIdentityTypesRepository->create($input);

        Flash::success('Master Identity Types saved successfully.');

        return redirect(route('masters.masterIdentityTypes.index'));
    }

    /**
     * Display the specified MasterIdentityTypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterIdentityTypes = $this->masterIdentityTypesRepository->find($id);

        if (empty($masterIdentityTypes)) {
            Flash::error('Master Identity Types not found');

            return redirect(route('masters.masterIdentityTypes.index'));
        }

        return view('masters.master_identity_types.show')->with('masterIdentityTypes', $masterIdentityTypes);
    }

    /**
     * Show the form for editing the specified MasterIdentityTypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterIdentityTypes = $this->masterIdentityTypesRepository->find($id);

        if (empty($masterIdentityTypes)) {
            Flash::error('Master Identity Types not found');

            return redirect(route('masters.masterIdentityTypes.index'));
        }

        return view('masters.master_identity_types.edit')->with('masterIdentityTypes', $masterIdentityTypes);
    }

    /**
     * Update the specified MasterIdentityTypes in storage.
     *
     * @param int $id
     * @param UpdateMasterIdentityTypesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterIdentityTypesRequest $request)
    {
        $masterIdentityTypes = $this->masterIdentityTypesRepository->find($id);

        if (empty($masterIdentityTypes)) {
            Flash::error('Master Identity Types not found');

            return redirect(route('masters.masterIdentityTypes.index'));
        }

        $masterIdentityTypes = $this->masterIdentityTypesRepository->update($request->all(), $id);

        Flash::success('Master Identity Types updated successfully.');

        return redirect(route('masters.masterIdentityTypes.index'));
    }

    /**
     * Remove the specified MasterIdentityTypes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterIdentityTypes = $this->masterIdentityTypesRepository->find($id);

        if (empty($masterIdentityTypes)) {
            Flash::error('Master Identity Types not found');

            return redirect(route('masters.masterIdentityTypes.index'));
        }

        $this->masterIdentityTypesRepository->delete($id);

        Flash::success('Master Identity Types deleted successfully.');

        return redirect(route('masters.masterIdentityTypes.index'));
    }
}
