<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterGendersRequest;
use App\Http\Requests\Masters\UpdateMasterGendersRequest;
use App\Repositories\Masters\MasterGendersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterGendersController extends AppBaseController
{
    /** @var  MasterGendersRepository */
    private $masterGendersRepository;

    public function __construct(MasterGendersRepository $masterGendersRepo)
    {
        $this->masterGendersRepository = $masterGendersRepo;
    }

    /**
     * Display a listing of the MasterGenders.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterGenders = $this->masterGendersRepository->paginate(20);

        return view('masters.master_genders.index')
            ->with('masterGenders', $masterGenders);
    }

    /**
     * Show the form for creating a new MasterGenders.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_genders.create');
    }

    /**
     * Store a newly created MasterGenders in storage.
     *
     * @param CreateMasterGendersRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterGendersRequest $request)
    {
        $input = $request->all();

        $masterGenders = $this->masterGendersRepository->create($input);

        Flash::success('Master Genders saved successfully.');

        return redirect(route('masters.masterGenders.index'));
    }

    /**
     * Display the specified MasterGenders.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterGenders = $this->masterGendersRepository->find($id);

        if (empty($masterGenders)) {
            Flash::error('Master Genders not found');

            return redirect(route('masters.masterGenders.index'));
        }

        return view('masters.master_genders.show')->with('masterGenders', $masterGenders);
    }

    /**
     * Show the form for editing the specified MasterGenders.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterGenders = $this->masterGendersRepository->find($id);

        if (empty($masterGenders)) {
            Flash::error('Master Genders not found');

            return redirect(route('masters.masterGenders.index'));
        }

        return view('masters.master_genders.edit')->with('masterGenders', $masterGenders);
    }

    /**
     * Update the specified MasterGenders in storage.
     *
     * @param int $id
     * @param UpdateMasterGendersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterGendersRequest $request)
    {
        $masterGenders = $this->masterGendersRepository->find($id);

        if (empty($masterGenders)) {
            Flash::error('Master Genders not found');

            return redirect(route('masters.masterGenders.index'));
        }

        $masterGenders = $this->masterGendersRepository->update($request->all(), $id);

        Flash::success('Master Genders updated successfully.');

        return redirect(route('masters.masterGenders.index'));
    }

    /**
     * Remove the specified MasterGenders from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterGenders = $this->masterGendersRepository->find($id);

        if (empty($masterGenders)) {
            Flash::error('Master Genders not found');

            return redirect(route('masters.masterGenders.index'));
        }

        $this->masterGendersRepository->delete($id);

        Flash::success('Master Genders deleted successfully.');

        return redirect(route('masters.masterGenders.index'));
    }
}
