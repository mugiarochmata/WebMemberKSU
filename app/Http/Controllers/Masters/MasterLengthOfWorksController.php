<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterLengthOfWorksRequest;
use App\Http\Requests\Masters\UpdateMasterLengthOfWorksRequest;
use App\Repositories\Masters\MasterLengthOfWorksRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterLengthOfWorksController extends AppBaseController
{
    /** @var  MasterLengthOfWorksRepository */
    private $masterLengthOfWorksRepository;

    public function __construct(MasterLengthOfWorksRepository $masterLengthOfWorksRepo)
    {
        $this->masterLengthOfWorksRepository = $masterLengthOfWorksRepo;
    }

    /**
     * Display a listing of the MasterLengthOfWorks.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterLengthOfWorks = $this->masterLengthOfWorksRepository->paginate(20);

        return view('masters.master_length_of_works.index')
            ->with('masterLengthOfWorks', $masterLengthOfWorks);
    }

    /**
     * Show the form for creating a new MasterLengthOfWorks.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_length_of_works.create');
    }

    /**
     * Store a newly created MasterLengthOfWorks in storage.
     *
     * @param CreateMasterLengthOfWorksRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterLengthOfWorksRequest $request)
    {
        $input = $request->all();

        $masterLengthOfWorks = $this->masterLengthOfWorksRepository->create($input);

        Flash::success('Master Length Of Works saved successfully.');

        return redirect(route('masters.masterLengthOfWorks.index'));
    }

    /**
     * Display the specified MasterLengthOfWorks.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterLengthOfWorks = $this->masterLengthOfWorksRepository->find($id);

        if (empty($masterLengthOfWorks)) {
            Flash::error('Master Length Of Works not found');

            return redirect(route('masters.masterLengthOfWorks.index'));
        }

        return view('masters.master_length_of_works.show')->with('masterLengthOfWorks', $masterLengthOfWorks);
    }

    /**
     * Show the form for editing the specified MasterLengthOfWorks.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterLengthOfWorks = $this->masterLengthOfWorksRepository->find($id);

        if (empty($masterLengthOfWorks)) {
            Flash::error('Master Length Of Works not found');

            return redirect(route('masters.masterLengthOfWorks.index'));
        }

        return view('masters.master_length_of_works.edit')->with('masterLengthOfWorks', $masterLengthOfWorks);
    }

    /**
     * Update the specified MasterLengthOfWorks in storage.
     *
     * @param int $id
     * @param UpdateMasterLengthOfWorksRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterLengthOfWorksRequest $request)
    {
        $masterLengthOfWorks = $this->masterLengthOfWorksRepository->find($id);

        if (empty($masterLengthOfWorks)) {
            Flash::error('Master Length Of Works not found');

            return redirect(route('masters.masterLengthOfWorks.index'));
        }

        $masterLengthOfWorks = $this->masterLengthOfWorksRepository->update($request->all(), $id);

        Flash::success('Master Length Of Works updated successfully.');

        return redirect(route('masters.masterLengthOfWorks.index'));
    }

    /**
     * Remove the specified MasterLengthOfWorks from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterLengthOfWorks = $this->masterLengthOfWorksRepository->find($id);

        if (empty($masterLengthOfWorks)) {
            Flash::error('Master Length Of Works not found');

            return redirect(route('masters.masterLengthOfWorks.index'));
        }

        $this->masterLengthOfWorksRepository->delete($id);

        Flash::success('Master Length Of Works deleted successfully.');

        return redirect(route('masters.masterLengthOfWorks.index'));
    }
}
