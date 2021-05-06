<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterRepaymentSourcesRequest;
use App\Http\Requests\Masters\UpdateMasterRepaymentSourcesRequest;
use App\Repositories\Masters\MasterRepaymentSourcesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterRepaymentSourcesController extends AppBaseController
{
    /** @var  MasterRepaymentSourcesRepository */
    private $masterRepaymentSourcesRepository;

    public function __construct(MasterRepaymentSourcesRepository $masterRepaymentSourcesRepo)
    {
        $this->masterRepaymentSourcesRepository = $masterRepaymentSourcesRepo;
    }

    /**
     * Display a listing of the MasterRepaymentSources.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterRepaymentSources = $this->masterRepaymentSourcesRepository->paginate(20);

        return view('masters.master_repayment_sources.index')
            ->with('masterRepaymentSources', $masterRepaymentSources);
    }

    /**
     * Show the form for creating a new MasterRepaymentSources.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_repayment_sources.create');
    }

    /**
     * Store a newly created MasterRepaymentSources in storage.
     *
     * @param CreateMasterRepaymentSourcesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterRepaymentSourcesRequest $request)
    {
        $input = $request->all();

        $masterRepaymentSources = $this->masterRepaymentSourcesRepository->create($input);

        Flash::success('Master Repayment Sources saved successfully.');

        return redirect(route('masters.masterRepaymentSources.index'));
    }

    /**
     * Display the specified MasterRepaymentSources.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterRepaymentSources = $this->masterRepaymentSourcesRepository->find($id);

        if (empty($masterRepaymentSources)) {
            Flash::error('Master Repayment Sources not found');

            return redirect(route('masters.masterRepaymentSources.index'));
        }

        return view('masters.master_repayment_sources.show')->with('masterRepaymentSources', $masterRepaymentSources);
    }

    /**
     * Show the form for editing the specified MasterRepaymentSources.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterRepaymentSources = $this->masterRepaymentSourcesRepository->find($id);

        if (empty($masterRepaymentSources)) {
            Flash::error('Master Repayment Sources not found');

            return redirect(route('masters.masterRepaymentSources.index'));
        }

        return view('masters.master_repayment_sources.edit')->with('masterRepaymentSources', $masterRepaymentSources);
    }

    /**
     * Update the specified MasterRepaymentSources in storage.
     *
     * @param int $id
     * @param UpdateMasterRepaymentSourcesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterRepaymentSourcesRequest $request)
    {
        $masterRepaymentSources = $this->masterRepaymentSourcesRepository->find($id);

        if (empty($masterRepaymentSources)) {
            Flash::error('Master Repayment Sources not found');

            return redirect(route('masters.masterRepaymentSources.index'));
        }

        $masterRepaymentSources = $this->masterRepaymentSourcesRepository->update($request->all(), $id);

        Flash::success('Master Repayment Sources updated successfully.');

        return redirect(route('masters.masterRepaymentSources.index'));
    }

    /**
     * Remove the specified MasterRepaymentSources from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterRepaymentSources = $this->masterRepaymentSourcesRepository->find($id);

        if (empty($masterRepaymentSources)) {
            Flash::error('Master Repayment Sources not found');

            return redirect(route('masters.masterRepaymentSources.index'));
        }

        $this->masterRepaymentSourcesRepository->delete($id);

        Flash::success('Master Repayment Sources deleted successfully.');

        return redirect(route('masters.masterRepaymentSources.index'));
    }
}
