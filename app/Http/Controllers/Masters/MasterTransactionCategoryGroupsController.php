<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterTransactionCategoryGroupsRequest;
use App\Http\Requests\Masters\UpdateMasterTransactionCategoryGroupsRequest;
use App\Repositories\Masters\MasterTransactionCategoryGroupsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterTransactionCategoryGroupsController extends AppBaseController
{
    /** @var  MasterTransactionCategoryGroupsRepository */
    private $masterTransactionCategoryGroupsRepository;

    public function __construct(MasterTransactionCategoryGroupsRepository $masterTransactionCategoryGroupsRepo)
    {
        $this->masterTransactionCategoryGroupsRepository = $masterTransactionCategoryGroupsRepo;
    }

    /**
     * Display a listing of the MasterTransactionCategoryGroups.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterTransactionCategoryGroups = $this->masterTransactionCategoryGroupsRepository->paginate(20);

        return view('masters.master_transaction_category_groups.index')
            ->with('masterTransactionCategoryGroups', $masterTransactionCategoryGroups);
    }

    /**
     * Show the form for creating a new MasterTransactionCategoryGroups.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_transaction_category_groups.create');
    }

    /**
     * Store a newly created MasterTransactionCategoryGroups in storage.
     *
     * @param CreateMasterTransactionCategoryGroupsRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterTransactionCategoryGroupsRequest $request)
    {
        $input = $request->all();

        $masterTransactionCategoryGroups = $this->masterTransactionCategoryGroupsRepository->create($input);

        Flash::success('Master Transaction Category Groups saved successfully.');

        return redirect(route('masters.masterTransactionCategoryGroups.index'));
    }

    /**
     * Display the specified MasterTransactionCategoryGroups.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterTransactionCategoryGroups = $this->masterTransactionCategoryGroupsRepository->find($id);

        if (empty($masterTransactionCategoryGroups)) {
            Flash::error('Master Transaction Category Groups not found');

            return redirect(route('masters.masterTransactionCategoryGroups.index'));
        }

        return view('masters.master_transaction_category_groups.show')->with('masterTransactionCategoryGroups', $masterTransactionCategoryGroups);
    }

    /**
     * Show the form for editing the specified MasterTransactionCategoryGroups.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterTransactionCategoryGroups = $this->masterTransactionCategoryGroupsRepository->find($id);

        if (empty($masterTransactionCategoryGroups)) {
            Flash::error('Master Transaction Category Groups not found');

            return redirect(route('masters.masterTransactionCategoryGroups.index'));
        }

        return view('masters.master_transaction_category_groups.edit')->with('masterTransactionCategoryGroups', $masterTransactionCategoryGroups);
    }

    /**
     * Update the specified MasterTransactionCategoryGroups in storage.
     *
     * @param int $id
     * @param UpdateMasterTransactionCategoryGroupsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterTransactionCategoryGroupsRequest $request)
    {
        $masterTransactionCategoryGroups = $this->masterTransactionCategoryGroupsRepository->find($id);

        if (empty($masterTransactionCategoryGroups)) {
            Flash::error('Master Transaction Category Groups not found');

            return redirect(route('masters.masterTransactionCategoryGroups.index'));
        }

        $masterTransactionCategoryGroups = $this->masterTransactionCategoryGroupsRepository->update($request->all(), $id);

        Flash::success('Master Transaction Category Groups updated successfully.');

        return redirect(route('masters.masterTransactionCategoryGroups.index'));
    }

    /**
     * Remove the specified MasterTransactionCategoryGroups from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterTransactionCategoryGroups = $this->masterTransactionCategoryGroupsRepository->find($id);

        if (empty($masterTransactionCategoryGroups)) {
            Flash::error('Master Transaction Category Groups not found');

            return redirect(route('masters.masterTransactionCategoryGroups.index'));
        }

        $this->masterTransactionCategoryGroupsRepository->delete($id);

        Flash::success('Master Transaction Category Groups deleted successfully.');

        return redirect(route('masters.masterTransactionCategoryGroups.index'));
    }
}
