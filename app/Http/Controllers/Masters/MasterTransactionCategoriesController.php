<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterTransactionCategoriesRequest;
use App\Http\Requests\Masters\UpdateMasterTransactionCategoriesRequest;
use App\Repositories\Masters\MasterTransactionCategoriesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterTransactionCategoriesController extends AppBaseController
{
    /** @var  MasterTransactionCategoriesRepository */
    private $masterTransactionCategoriesRepository;

    public function __construct(MasterTransactionCategoriesRepository $masterTransactionCategoriesRepo)
    {
        $this->masterTransactionCategoriesRepository = $masterTransactionCategoriesRepo;
    }

    /**
     * Display a listing of the MasterTransactionCategories.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterTransactionCategories = $this->masterTransactionCategoriesRepository->paginate(20);

        return view('masters.master_transaction_categories.index')
            ->with('masterTransactionCategories', $masterTransactionCategories);
    }

    /**
     * Show the form for creating a new MasterTransactionCategories.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_transaction_categories.create');
    }

    /**
     * Store a newly created MasterTransactionCategories in storage.
     *
     * @param CreateMasterTransactionCategoriesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterTransactionCategoriesRequest $request)
    {
        $input = $request->all();

        $masterTransactionCategories = $this->masterTransactionCategoriesRepository->create($input);

        Flash::success('Master Transaction Categories saved successfully.');

        return redirect(route('masters.masterTransactionCategories.index'));
    }

    /**
     * Display the specified MasterTransactionCategories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterTransactionCategories = $this->masterTransactionCategoriesRepository->find($id);

        if (empty($masterTransactionCategories)) {
            Flash::error('Master Transaction Categories not found');

            return redirect(route('masters.masterTransactionCategories.index'));
        }

        return view('masters.master_transaction_categories.show')->with('masterTransactionCategories', $masterTransactionCategories);
    }

    /**
     * Show the form for editing the specified MasterTransactionCategories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterTransactionCategories = $this->masterTransactionCategoriesRepository->find($id);

        if (empty($masterTransactionCategories)) {
            Flash::error('Master Transaction Categories not found');

            return redirect(route('masters.masterTransactionCategories.index'));
        }

        return view('masters.master_transaction_categories.edit')->with('masterTransactionCategories', $masterTransactionCategories);
    }

    /**
     * Update the specified MasterTransactionCategories in storage.
     *
     * @param int $id
     * @param UpdateMasterTransactionCategoriesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterTransactionCategoriesRequest $request)
    {
        $masterTransactionCategories = $this->masterTransactionCategoriesRepository->find($id);

        if (empty($masterTransactionCategories)) {
            Flash::error('Master Transaction Categories not found');

            return redirect(route('masters.masterTransactionCategories.index'));
        }

        $masterTransactionCategories = $this->masterTransactionCategoriesRepository->update($request->all(), $id);

        Flash::success('Master Transaction Categories updated successfully.');

        return redirect(route('masters.masterTransactionCategories.index'));
    }

    /**
     * Remove the specified MasterTransactionCategories from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterTransactionCategories = $this->masterTransactionCategoriesRepository->find($id);

        if (empty($masterTransactionCategories)) {
            Flash::error('Master Transaction Categories not found');

            return redirect(route('masters.masterTransactionCategories.index'));
        }

        $this->masterTransactionCategoriesRepository->delete($id);

        Flash::success('Master Transaction Categories deleted successfully.');

        return redirect(route('masters.masterTransactionCategories.index'));
    }
}
