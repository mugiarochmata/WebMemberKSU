<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterEducationsRequest;
use App\Http\Requests\Masters\UpdateMasterEducationsRequest;
use App\Repositories\Masters\MasterEducationsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterEducationsController extends AppBaseController
{
    /** @var  MasterEducationsRepository */
    private $masterEducationsRepository;

    public function __construct(MasterEducationsRepository $masterEducationsRepo)
    {
        $this->masterEducationsRepository = $masterEducationsRepo;
    }

    /**
     * Display a listing of the MasterEducations.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterEducations = $this->masterEducationsRepository->paginate(20);

        return view('masters.master_educations.index')
            ->with('masterEducations', $masterEducations);
    }

    /**
     * Show the form for creating a new MasterEducations.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_educations.create');
    }

    /**
     * Store a newly created MasterEducations in storage.
     *
     * @param CreateMasterEducationsRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterEducationsRequest $request)
    {
        $input = $request->all();

        $masterEducations = $this->masterEducationsRepository->create($input);

        Flash::success('Master Educations saved successfully.');

        return redirect(route('masters.masterEducations.index'));
    }

    /**
     * Display the specified MasterEducations.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterEducations = $this->masterEducationsRepository->find($id);

        if (empty($masterEducations)) {
            Flash::error('Master Educations not found');

            return redirect(route('masters.masterEducations.index'));
        }

        return view('masters.master_educations.show')->with('masterEducations', $masterEducations);
    }

    /**
     * Show the form for editing the specified MasterEducations.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterEducations = $this->masterEducationsRepository->find($id);

        if (empty($masterEducations)) {
            Flash::error('Master Educations not found');

            return redirect(route('masters.masterEducations.index'));
        }

        return view('masters.master_educations.edit')->with('masterEducations', $masterEducations);
    }

    /**
     * Update the specified MasterEducations in storage.
     *
     * @param int $id
     * @param UpdateMasterEducationsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterEducationsRequest $request)
    {
        $masterEducations = $this->masterEducationsRepository->find($id);

        if (empty($masterEducations)) {
            Flash::error('Master Educations not found');

            return redirect(route('masters.masterEducations.index'));
        }

        $masterEducations = $this->masterEducationsRepository->update($request->all(), $id);

        Flash::success('Master Educations updated successfully.');

        return redirect(route('masters.masterEducations.index'));
    }

    /**
     * Remove the specified MasterEducations from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterEducations = $this->masterEducationsRepository->find($id);

        if (empty($masterEducations)) {
            Flash::error('Master Educations not found');

            return redirect(route('masters.masterEducations.index'));
        }

        $this->masterEducationsRepository->delete($id);

        Flash::success('Master Educations deleted successfully.');

        return redirect(route('masters.masterEducations.index'));
    }
}
