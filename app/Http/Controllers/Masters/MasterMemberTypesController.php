<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterMemberTypesRequest;
use App\Http\Requests\Masters\UpdateMasterMemberTypesRequest;
use App\Repositories\Masters\MasterMemberTypesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterMemberTypesController extends AppBaseController
{
    /** @var  MasterMemberTypesRepository */
    private $masterMemberTypesRepository;

    public function __construct(MasterMemberTypesRepository $masterMemberTypesRepo)
    {
        $this->masterMemberTypesRepository = $masterMemberTypesRepo;
    }

    /**
     * Display a listing of the MasterMemberTypes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterMemberTypes = $this->masterMemberTypesRepository->paginate(20);

        return view('masters.master_member_types.index')
            ->with('masterMemberTypes', $masterMemberTypes);
    }

    /**
     * Show the form for creating a new MasterMemberTypes.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_member_types.create');
    }

    /**
     * Store a newly created MasterMemberTypes in storage.
     *
     * @param CreateMasterMemberTypesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterMemberTypesRequest $request)
    {
        $input = $request->all();

        $masterMemberTypes = $this->masterMemberTypesRepository->create($input);

        Flash::success('Master Member Types saved successfully.');

        return redirect(route('masters.masterMemberTypes.index'));
    }

    /**
     * Display the specified MasterMemberTypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterMemberTypes = $this->masterMemberTypesRepository->find($id);

        if (empty($masterMemberTypes)) {
            Flash::error('Master Member Types not found');

            return redirect(route('masters.masterMemberTypes.index'));
        }

        return view('masters.master_member_types.show')->with('masterMemberTypes', $masterMemberTypes);
    }

    /**
     * Show the form for editing the specified MasterMemberTypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterMemberTypes = $this->masterMemberTypesRepository->find($id);

        if (empty($masterMemberTypes)) {
            Flash::error('Master Member Types not found');

            return redirect(route('masters.masterMemberTypes.index'));
        }

        return view('masters.master_member_types.edit')->with('masterMemberTypes', $masterMemberTypes);
    }

    /**
     * Update the specified MasterMemberTypes in storage.
     *
     * @param int $id
     * @param UpdateMasterMemberTypesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterMemberTypesRequest $request)
    {
        $masterMemberTypes = $this->masterMemberTypesRepository->find($id);

        if (empty($masterMemberTypes)) {
            Flash::error('Master Member Types not found');

            return redirect(route('masters.masterMemberTypes.index'));
        }

        $masterMemberTypes = $this->masterMemberTypesRepository->update($request->all(), $id);

        Flash::success('Master Member Types updated successfully.');

        return redirect(route('masters.masterMemberTypes.index'));
    }

    /**
     * Remove the specified MasterMemberTypes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterMemberTypes = $this->masterMemberTypesRepository->find($id);

        if (empty($masterMemberTypes)) {
            Flash::error('Master Member Types not found');

            return redirect(route('masters.masterMemberTypes.index'));
        }

        $this->masterMemberTypesRepository->delete($id);

        Flash::success('Master Member Types deleted successfully.');

        return redirect(route('masters.masterMemberTypes.index'));
    }
}
