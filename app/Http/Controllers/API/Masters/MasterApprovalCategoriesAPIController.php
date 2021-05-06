<?php

namespace App\Http\Controllers\API\Masters;

use App\Http\Requests\API\Masters\CreateMasterApprovalCategoriesAPIRequest;
use App\Http\Requests\API\Masters\UpdateMasterApprovalCategoriesAPIRequest;
use App\Models\Masters\MasterApprovalCategories;
use App\Repositories\Masters\MasterApprovalCategoriesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MasterApprovalCategoriesController
 * @package App\Http\Controllers\API\Masters
 */

class MasterApprovalCategoriesAPIController extends AppBaseController
{
    /** @var  MasterApprovalCategoriesRepository */
    private $masterApprovalCategoriesRepository;

    public function __construct(MasterApprovalCategoriesRepository $masterApprovalCategoriesRepo)
    {
        $this->masterApprovalCategoriesRepository = $masterApprovalCategoriesRepo;
    }

    /**
     * Display a listing of the MasterApprovalCategories.
     * GET|HEAD /masterApprovalCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $masterApprovalCategories = $this->masterApprovalCategoriesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($masterApprovalCategories->toArray(), 'Master Approval Categories retrieved successfully');
    }

    /**
     * Store a newly created MasterApprovalCategories in storage.
     * POST /masterApprovalCategories
     *
     * @param CreateMasterApprovalCategoriesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterApprovalCategoriesAPIRequest $request)
    {
        $input = $request->all();

        $masterApprovalCategories = $this->masterApprovalCategoriesRepository->create($input);

        return $this->sendResponse($masterApprovalCategories->toArray(), 'Master Approval Categories saved successfully');
    }

    /**
     * Display the specified MasterApprovalCategories.
     * GET|HEAD /masterApprovalCategories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MasterApprovalCategories $masterApprovalCategories */
        $masterApprovalCategories = $this->masterApprovalCategoriesRepository->find($id);

        if (empty($masterApprovalCategories)) {
            return $this->sendError('Master Approval Categories not found');
        }

        return $this->sendResponse($masterApprovalCategories->toArray(), 'Master Approval Categories retrieved successfully');
    }

    /**
     * Update the specified MasterApprovalCategories in storage.
     * PUT/PATCH /masterApprovalCategories/{id}
     *
     * @param int $id
     * @param UpdateMasterApprovalCategoriesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterApprovalCategoriesAPIRequest $request)
    {
        $input = $request->all();

        /** @var MasterApprovalCategories $masterApprovalCategories */
        $masterApprovalCategories = $this->masterApprovalCategoriesRepository->find($id);

        if (empty($masterApprovalCategories)) {
            return $this->sendError('Master Approval Categories not found');
        }

        $masterApprovalCategories = $this->masterApprovalCategoriesRepository->update($input, $id);

        return $this->sendResponse($masterApprovalCategories->toArray(), 'MasterApprovalCategories updated successfully');
    }

    /**
     * Remove the specified MasterApprovalCategories from storage.
     * DELETE /masterApprovalCategories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MasterApprovalCategories $masterApprovalCategories */
        $masterApprovalCategories = $this->masterApprovalCategoriesRepository->find($id);

        if (empty($masterApprovalCategories)) {
            return $this->sendError('Master Approval Categories not found');
        }

        $masterApprovalCategories->delete();

        return $this->sendSuccess('Master Approval Categories deleted successfully');
    }
}
