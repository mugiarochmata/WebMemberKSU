<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterGlobalParametersRequest;
use App\Http\Requests\Masters\UpdateMasterGlobalParametersRequest;
use App\Repositories\Masters\MasterGlobalParametersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterGlobalParametersController extends AppBaseController
{
    /** @var  MasterGlobalParametersRepository */
    private $masterGlobalParametersRepository;

    public function __construct(MasterGlobalParametersRepository $masterGlobalParametersRepo)
    {
        $this->masterGlobalParametersRepository = $masterGlobalParametersRepo;
    }

    /**
     * Display a listing of the MasterGlobalParameters.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterGlobalParameters = $this->masterGlobalParametersRepository->paginate(20);

        return view('masters.master_global_parameters.index')
            ->with('masterGlobalParameters', $masterGlobalParameters);
    }

    /**
     * Show the form for creating a new MasterGlobalParameters.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_global_parameters.create');
    }

    /**
     * Store a newly created MasterGlobalParameters in storage.
     *
     * @param CreateMasterGlobalParametersRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterGlobalParametersRequest $request)
    {
        $input = $request->all();

        $masterGlobalParameters = $this->masterGlobalParametersRepository->create($input);

        Flash::success('Master Global Parameters saved successfully.');

        return redirect(route('masters.masterGlobalParameters.index'));
    }

    /**
     * Display the specified MasterGlobalParameters.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterGlobalParameters = $this->masterGlobalParametersRepository->find($id);

        if (empty($masterGlobalParameters)) {
            Flash::error('Master Global Parameters not found');

            return redirect(route('masters.masterGlobalParameters.index'));
        }

        return view('masters.master_global_parameters.show')->with('masterGlobalParameters', $masterGlobalParameters);
    }

    /**
     * Show the form for editing the specified MasterGlobalParameters.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterGlobalParameters = $this->masterGlobalParametersRepository->find($id);

        if (empty($masterGlobalParameters)) {
            Flash::error('Master Global Parameters not found');

            return redirect(route('masters.masterGlobalParameters.index'));
        }

        return view('masters.master_global_parameters.edit')->with('masterGlobalParameters', $masterGlobalParameters);
    }

    /**
     * Update the specified MasterGlobalParameters in storage.
     *
     * @param int $id
     * @param UpdateMasterGlobalParametersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterGlobalParametersRequest $request)
    {
        $masterGlobalParameters = $this->masterGlobalParametersRepository->find($id);

        if (empty($masterGlobalParameters)) {
            Flash::error('Master Global Parameters not found');

            return redirect(route('masters.masterGlobalParameters.index'));
        }

        $masterGlobalParameters = $this->masterGlobalParametersRepository->update($request->all(), $id);

        Flash::success('Master Global Parameters updated successfully.');

        return redirect(route('masters.masterGlobalParameters.index'));
    }

    /**
     * Remove the specified MasterGlobalParameters from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterGlobalParameters = $this->masterGlobalParametersRepository->find($id);

        if (empty($masterGlobalParameters)) {
            Flash::error('Master Global Parameters not found');

            return redirect(route('masters.masterGlobalParameters.index'));
        }

        $this->masterGlobalParametersRepository->delete($id);

        Flash::success('Master Global Parameters deleted successfully.');

        return redirect(route('masters.masterGlobalParameters.index'));
    }
}
