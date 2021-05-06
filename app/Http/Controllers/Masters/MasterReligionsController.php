<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterReligionsRequest;
use App\Http\Requests\Masters\UpdateMasterReligionsRequest;
use App\Repositories\Masters\MasterReligionsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterReligionsController extends AppBaseController
{
    /** @var  MasterReligionsRepository */
    private $masterReligionsRepository;

    public function __construct(MasterReligionsRepository $masterReligionsRepo)
    {
        $this->masterReligionsRepository = $masterReligionsRepo;
    }

    /**
     * Display a listing of the MasterReligions.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterReligions = $this->masterReligionsRepository->paginate(20);

        return view('masters.master_religions.index')
            ->with('masterReligions', $masterReligions);
    }

    /**
     * Show the form for creating a new MasterReligions.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_religions.create');
    }

    /**
     * Store a newly created MasterReligions in storage.
     *
     * @param CreateMasterReligionsRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterReligionsRequest $request)
    {
        $input = $request->all();

        $masterReligions = $this->masterReligionsRepository->create($input);

        Flash::success('Master Religions saved successfully.');

        return redirect(route('masters.masterReligions.index'));
    }

    /**
     * Display the specified MasterReligions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterReligions = $this->masterReligionsRepository->find($id);

        if (empty($masterReligions)) {
            Flash::error('Master Religions not found');

            return redirect(route('masters.masterReligions.index'));
        }

        return view('masters.master_religions.show')->with('masterReligions', $masterReligions);
    }

    /**
     * Show the form for editing the specified MasterReligions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterReligions = $this->masterReligionsRepository->find($id);

        if (empty($masterReligions)) {
            Flash::error('Master Religions not found');

            return redirect(route('masters.masterReligions.index'));
        }

        return view('masters.master_religions.edit')->with('masterReligions', $masterReligions);
    }

    /**
     * Update the specified MasterReligions in storage.
     *
     * @param int $id
     * @param UpdateMasterReligionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterReligionsRequest $request)
    {
        $masterReligions = $this->masterReligionsRepository->find($id);

        if (empty($masterReligions)) {
            Flash::error('Master Religions not found');

            return redirect(route('masters.masterReligions.index'));
        }

        $masterReligions = $this->masterReligionsRepository->update($request->all(), $id);

        Flash::success('Master Religions updated successfully.');

        return redirect(route('masters.masterReligions.index'));
    }

    /**
     * Remove the specified MasterReligions from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterReligions = $this->masterReligionsRepository->find($id);

        if (empty($masterReligions)) {
            Flash::error('Master Religions not found');

            return redirect(route('masters.masterReligions.index'));
        }

        $this->masterReligionsRepository->delete($id);

        Flash::success('Master Religions deleted successfully.');

        return redirect(route('masters.masterReligions.index'));
    }
}
