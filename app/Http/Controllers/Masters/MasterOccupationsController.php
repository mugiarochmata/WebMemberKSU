<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterOccupationsRequest;
use App\Http\Requests\Masters\UpdateMasterOccupationsRequest;
use App\Repositories\Masters\MasterOccupationsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterOccupationsController extends AppBaseController
{
    /** @var  MasterOccupationsRepository */
    private $masterOccupationsRepository;

    public function __construct(MasterOccupationsRepository $masterOccupationsRepo)
    {
        $this->masterOccupationsRepository = $masterOccupationsRepo;
    }

    /**
     * Display a listing of the MasterOccupations.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterOccupations = $this->masterOccupationsRepository->paginate(20);

        return view('masters.master_occupations.index')
            ->with('masterOccupations', $masterOccupations);
    }

    /**
     * Show the form for creating a new MasterOccupations.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_occupations.create');
    }

    /**
     * Store a newly created MasterOccupations in storage.
     *
     * @param CreateMasterOccupationsRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterOccupationsRequest $request)
    {
        $input = $request->all();

        $masterOccupations = $this->masterOccupationsRepository->create($input);

        Flash::success('Master Occupations saved successfully.');

        return redirect(route('masters.masterOccupations.index'));
    }

    /**
     * Display the specified MasterOccupations.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterOccupations = $this->masterOccupationsRepository->find($id);

        if (empty($masterOccupations)) {
            Flash::error('Master Occupations not found');

            return redirect(route('masters.masterOccupations.index'));
        }

        return view('masters.master_occupations.show')->with('masterOccupations', $masterOccupations);
    }

    /**
     * Show the form for editing the specified MasterOccupations.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterOccupations = $this->masterOccupationsRepository->find($id);

        if (empty($masterOccupations)) {
            Flash::error('Master Occupations not found');

            return redirect(route('masters.masterOccupations.index'));
        }

        return view('masters.master_occupations.edit')->with('masterOccupations', $masterOccupations);
    }

    /**
     * Update the specified MasterOccupations in storage.
     *
     * @param int $id
     * @param UpdateMasterOccupationsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterOccupationsRequest $request)
    {
        $masterOccupations = $this->masterOccupationsRepository->find($id);

        if (empty($masterOccupations)) {
            Flash::error('Master Occupations not found');

            return redirect(route('masters.masterOccupations.index'));
        }

        $masterOccupations = $this->masterOccupationsRepository->update($request->all(), $id);

        Flash::success('Master Occupations updated successfully.');

        return redirect(route('masters.masterOccupations.index'));
    }

    /**
     * Remove the specified MasterOccupations from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterOccupations = $this->masterOccupationsRepository->find($id);

        if (empty($masterOccupations)) {
            Flash::error('Master Occupations not found');

            return redirect(route('masters.masterOccupations.index'));
        }

        $this->masterOccupationsRepository->delete($id);

        Flash::success('Master Occupations deleted successfully.');

        return redirect(route('masters.masterOccupations.index'));
    }
}
