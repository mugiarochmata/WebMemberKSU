<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterApprovalCategoriesRequest;
use App\Http\Requests\Masters\UpdateMasterApprovalCategoriesRequest;
use App\Repositories\Masters\MasterApprovalCategoriesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterApprovalCategoriesController extends AppBaseController
{
    /** @var  MasterApprovalCategoriesRepository */
    private $masterApprovalCategoriesRepository;

    public function __construct(MasterApprovalCategoriesRepository $masterApprovalCategoriesRepo)
    {
        $this->masterApprovalCategoriesRepository = $masterApprovalCategoriesRepo;
    }

    /**
     * Display a listing of the MasterApprovalCategories.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterApprovalCategories = $this->masterApprovalCategoriesRepository->paginate(20);

        return view('masters.master_approval_categories.index')
            ->with('masterApprovalCategories', $masterApprovalCategories);
    }

    /**
     * Show the form for creating a new MasterApprovalCategories.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_approval_categories.create');
    }

    /**
     * Store a newly created MasterApprovalCategories in storage.
     *
     * @param CreateMasterApprovalCategoriesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterApprovalCategoriesRequest $request)
    {
        $input = $request->all();

        $masterApprovalCategories = $this->masterApprovalCategoriesRepository->create($input);

        Flash::success('Master Approval Categories saved successfully.');

        return redirect(route('masters.masterApprovalCategories.index'));
    }

    /**
     * Display the specified MasterApprovalCategories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterApprovalCategories = $this->masterApprovalCategoriesRepository->find($id);

        if (empty($masterApprovalCategories)) {
            Flash::error('Master Approval Categories not found');

            return redirect(route('masters.masterApprovalCategories.index'));
        }

        return view('masters.master_approval_categories.show')->with('masterApprovalCategories', $masterApprovalCategories);
    }

    /**
     * Show the form for editing the specified MasterApprovalCategories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterApprovalCategories = $this->masterApprovalCategoriesRepository->find($id);

        if (empty($masterApprovalCategories)) {
            Flash::error('Master Approval Categories not found');

            return redirect(route('masters.masterApprovalCategories.index'));
        }

        return view('masters.master_approval_categories.edit')->with('masterApprovalCategories', $masterApprovalCategories);
    }

    /**
     * Update the specified MasterApprovalCategories in storage.
     *
     * @param int $id
     * @param UpdateMasterApprovalCategoriesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterApprovalCategoriesRequest $request)
    {
        $masterApprovalCategories = $this->masterApprovalCategoriesRepository->find($id);

        if (empty($masterApprovalCategories)) {
            Flash::error('Master Approval Categories not found');

            return redirect(route('masters.masterApprovalCategories.index'));
        }

        $masterApprovalCategories = $this->masterApprovalCategoriesRepository->update($request->all(), $id);

        Flash::success('Master Approval Categories updated successfully.');

        return redirect(route('masters.masterApprovalCategories.index'));
    }

    /**
     * Remove the specified MasterApprovalCategories from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterApprovalCategories = $this->masterApprovalCategoriesRepository->find($id);

        if (empty($masterApprovalCategories)) {
            Flash::error('Master Approval Categories not found');

            return redirect(route('masters.masterApprovalCategories.index'));
        }

        $this->masterApprovalCategoriesRepository->delete($id);

        Flash::success('Master Approval Categories deleted successfully.');

        return redirect(route('masters.masterApprovalCategories.index'));
    }
}
