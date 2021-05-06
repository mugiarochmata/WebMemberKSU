<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterSourceOfFundsRequest;
use App\Http\Requests\Masters\UpdateMasterSourceOfFundsRequest;
use App\Repositories\Masters\MasterSourceOfFundsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterSourceOfFundsController extends AppBaseController
{
    /** @var  MasterSourceOfFundsRepository */
    private $masterSourceOfFundsRepository;

    public function __construct(MasterSourceOfFundsRepository $masterSourceOfFundsRepo)
    {
        $this->masterSourceOfFundsRepository = $masterSourceOfFundsRepo;
    }

    /**
     * Display a listing of the MasterSourceOfFunds.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterSourceOfFunds = $this->masterSourceOfFundsRepository->paginate(20);

        return view('masters.master_source_of_funds.index')
            ->with('masterSourceOfFunds', $masterSourceOfFunds);
    }

    /**
     * Show the form for creating a new MasterSourceOfFunds.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_source_of_funds.create');
    }

    /**
     * Store a newly created MasterSourceOfFunds in storage.
     *
     * @param CreateMasterSourceOfFundsRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterSourceOfFundsRequest $request)
    {
        $input = $request->all();

        $masterSourceOfFunds = $this->masterSourceOfFundsRepository->create($input);

        Flash::success('Master Source Of Funds saved successfully.');

        return redirect(route('masters.masterSourceOfFunds.index'));
    }

    /**
     * Display the specified MasterSourceOfFunds.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterSourceOfFunds = $this->masterSourceOfFundsRepository->find($id);

        if (empty($masterSourceOfFunds)) {
            Flash::error('Master Source Of Funds not found');

            return redirect(route('masters.masterSourceOfFunds.index'));
        }

        return view('masters.master_source_of_funds.show')->with('masterSourceOfFunds', $masterSourceOfFunds);
    }

    /**
     * Show the form for editing the specified MasterSourceOfFunds.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterSourceOfFunds = $this->masterSourceOfFundsRepository->find($id);

        if (empty($masterSourceOfFunds)) {
            Flash::error('Master Source Of Funds not found');

            return redirect(route('masters.masterSourceOfFunds.index'));
        }

        return view('masters.master_source_of_funds.edit')->with('masterSourceOfFunds', $masterSourceOfFunds);
    }

    /**
     * Update the specified MasterSourceOfFunds in storage.
     *
     * @param int $id
     * @param UpdateMasterSourceOfFundsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterSourceOfFundsRequest $request)
    {
        $masterSourceOfFunds = $this->masterSourceOfFundsRepository->find($id);

        if (empty($masterSourceOfFunds)) {
            Flash::error('Master Source Of Funds not found');

            return redirect(route('masters.masterSourceOfFunds.index'));
        }

        $masterSourceOfFunds = $this->masterSourceOfFundsRepository->update($request->all(), $id);

        Flash::success('Master Source Of Funds updated successfully.');

        return redirect(route('masters.masterSourceOfFunds.index'));
    }

    /**
     * Remove the specified MasterSourceOfFunds from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterSourceOfFunds = $this->masterSourceOfFundsRepository->find($id);

        if (empty($masterSourceOfFunds)) {
            Flash::error('Master Source Of Funds not found');

            return redirect(route('masters.masterSourceOfFunds.index'));
        }

        $this->masterSourceOfFundsRepository->delete($id);

        Flash::success('Master Source Of Funds deleted successfully.');

        return redirect(route('masters.masterSourceOfFunds.index'));
    }
}
