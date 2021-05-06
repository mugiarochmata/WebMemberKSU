<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterProductSavingRulesRequest;
use App\Http\Requests\Masters\UpdateMasterProductSavingRulesRequest;
use App\Repositories\Masters\MasterProductSavingRulesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterProductSavingRulesController extends AppBaseController
{
    /** @var  MasterProductSavingRulesRepository */
    private $masterProductSavingRulesRepository;

    public function __construct(MasterProductSavingRulesRepository $masterProductSavingRulesRepo)
    {
        $this->masterProductSavingRulesRepository = $masterProductSavingRulesRepo;
    }

    /**
     * Display a listing of the MasterProductSavingRules.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterProductSavingRules = $this->masterProductSavingRulesRepository->paginate(20);

        return view('masters.master_product_saving_rules.index')
            ->with('masterProductSavingRules', $masterProductSavingRules);
    }

    /**
     * Show the form for creating a new MasterProductSavingRules.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_product_saving_rules.create');
    }

    /**
     * Store a newly created MasterProductSavingRules in storage.
     *
     * @param CreateMasterProductSavingRulesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterProductSavingRulesRequest $request)
    {
        $input = $request->all();

        $masterProductSavingRules = $this->masterProductSavingRulesRepository->create($input);

        Flash::success('Master Product Saving Rules saved successfully.');

        return redirect(route('masters.masterProductSavingRules.index'));
    }

    /**
     * Display the specified MasterProductSavingRules.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterProductSavingRules = $this->masterProductSavingRulesRepository->find($id);

        if (empty($masterProductSavingRules)) {
            Flash::error('Master Product Saving Rules not found');

            return redirect(route('masters.masterProductSavingRules.index'));
        }

        return view('masters.master_product_saving_rules.show')->with('masterProductSavingRules', $masterProductSavingRules);
    }

    /**
     * Show the form for editing the specified MasterProductSavingRules.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterProductSavingRules = $this->masterProductSavingRulesRepository->find($id);

        if (empty($masterProductSavingRules)) {
            Flash::error('Master Product Saving Rules not found');

            return redirect(route('masters.masterProductSavingRules.index'));
        }

        return view('masters.master_product_saving_rules.edit')->with('masterProductSavingRules', $masterProductSavingRules);
    }

    /**
     * Update the specified MasterProductSavingRules in storage.
     *
     * @param int $id
     * @param UpdateMasterProductSavingRulesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterProductSavingRulesRequest $request)
    {
        $masterProductSavingRules = $this->masterProductSavingRulesRepository->find($id);

        if (empty($masterProductSavingRules)) {
            Flash::error('Master Product Saving Rules not found');

            return redirect(route('masters.masterProductSavingRules.index'));
        }

        $masterProductSavingRules = $this->masterProductSavingRulesRepository->update($request->all(), $id);

        Flash::success('Master Product Saving Rules updated successfully.');

        return redirect(route('masters.masterProductSavingRules.index'));
    }

    /**
     * Remove the specified MasterProductSavingRules from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterProductSavingRules = $this->masterProductSavingRulesRepository->find($id);

        if (empty($masterProductSavingRules)) {
            Flash::error('Master Product Saving Rules not found');

            return redirect(route('masters.masterProductSavingRules.index'));
        }

        $this->masterProductSavingRulesRepository->delete($id);

        Flash::success('Master Product Saving Rules deleted successfully.');

        return redirect(route('masters.masterProductSavingRules.index'));
    }
}
