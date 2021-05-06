<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterLengthOfStaysRequest;
use App\Http\Requests\Masters\UpdateMasterLengthOfStaysRequest;
use App\Repositories\Masters\MasterLengthOfStaysRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterLengthOfStaysController extends AppBaseController
{
    /** @var  MasterLengthOfStaysRepository */
    private $masterLengthOfStaysRepository;

    public function __construct(MasterLengthOfStaysRepository $masterLengthOfStaysRepo)
    {
        $this->masterLengthOfStaysRepository = $masterLengthOfStaysRepo;
    }

    /**
     * Display a listing of the MasterLengthOfStays.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterLengthOfStays = $this->masterLengthOfStaysRepository->paginate(20);

        return view('masters.master_length_of_stays.index')
            ->with('masterLengthOfStays', $masterLengthOfStays);
    }

    /**
     * Show the form for creating a new MasterLengthOfStays.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_length_of_stays.create');
    }

    /**
     * Store a newly created MasterLengthOfStays in storage.
     *
     * @param CreateMasterLengthOfStaysRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterLengthOfStaysRequest $request)
    {
        $input = $request->all();

        $masterLengthOfStays = $this->masterLengthOfStaysRepository->create($input);

        Flash::success('Master Length Of Stays saved successfully.');

        return redirect(route('masters.masterLengthOfStays.index'));
    }

    /**
     * Display the specified MasterLengthOfStays.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterLengthOfStays = $this->masterLengthOfStaysRepository->find($id);

        if (empty($masterLengthOfStays)) {
            Flash::error('Master Length Of Stays not found');

            return redirect(route('masters.masterLengthOfStays.index'));
        }

        return view('masters.master_length_of_stays.show')->with('masterLengthOfStays', $masterLengthOfStays);
    }

    /**
     * Show the form for editing the specified MasterLengthOfStays.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterLengthOfStays = $this->masterLengthOfStaysRepository->find($id);

        if (empty($masterLengthOfStays)) {
            Flash::error('Master Length Of Stays not found');

            return redirect(route('masters.masterLengthOfStays.index'));
        }

        return view('masters.master_length_of_stays.edit')->with('masterLengthOfStays', $masterLengthOfStays);
    }

    /**
     * Update the specified MasterLengthOfStays in storage.
     *
     * @param int $id
     * @param UpdateMasterLengthOfStaysRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterLengthOfStaysRequest $request)
    {
        $masterLengthOfStays = $this->masterLengthOfStaysRepository->find($id);

        if (empty($masterLengthOfStays)) {
            Flash::error('Master Length Of Stays not found');

            return redirect(route('masters.masterLengthOfStays.index'));
        }

        $masterLengthOfStays = $this->masterLengthOfStaysRepository->update($request->all(), $id);

        Flash::success('Master Length Of Stays updated successfully.');

        return redirect(route('masters.masterLengthOfStays.index'));
    }

    /**
     * Remove the specified MasterLengthOfStays from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterLengthOfStays = $this->masterLengthOfStaysRepository->find($id);

        if (empty($masterLengthOfStays)) {
            Flash::error('Master Length Of Stays not found');

            return redirect(route('masters.masterLengthOfStays.index'));
        }

        $this->masterLengthOfStaysRepository->delete($id);

        Flash::success('Master Length Of Stays deleted successfully.');

        return redirect(route('masters.masterLengthOfStays.index'));
    }
}
