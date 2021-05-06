<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterProductSavingsRequest;
use App\Http\Requests\Masters\UpdateMasterProductSavingsRequest;
use App\Repositories\Masters\MasterProductSavingsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterProductSavingsController extends AppBaseController
{
    /** @var  MasterProductSavingsRepository */
    private $masterProductSavingsRepository;

    public function __construct(MasterProductSavingsRepository $masterProductSavingsRepo)
    {
        $this->masterProductSavingsRepository = $masterProductSavingsRepo;
    }

    /**
     * Display a listing of the MasterProductSavings.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterProductSavings = $this->masterProductSavingsRepository->paginate(20);

        return view('masters.master_product_savings.index')
            ->with('masterProductSavings', $masterProductSavings);
    }

    /**
     * Show the form for creating a new MasterProductSavings.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_product_savings.create');
    }

    /**
     * Store a newly created MasterProductSavings in storage.
     *
     * @param CreateMasterProductSavingsRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterProductSavingsRequest $request)
    {
        $input = $request->all();

        $masterProductSavings = $this->masterProductSavingsRepository->create($input);

        Flash::success('Master Product Savings saved successfully.');

        return redirect(route('masters.masterProductSavings.index'));
    }

    /**
     * Display the specified MasterProductSavings.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterProductSavings = $this->masterProductSavingsRepository->find($id);

        if (empty($masterProductSavings)) {
            Flash::error('Master Product Savings not found');

            return redirect(route('masters.masterProductSavings.index'));
        }

        return view('masters.master_product_savings.show')->with('masterProductSavings', $masterProductSavings);
    }

    /**
     * Show the form for editing the specified MasterProductSavings.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterProductSavings = $this->masterProductSavingsRepository->find($id);

        if (empty($masterProductSavings)) {
            Flash::error('Master Product Savings not found');

            return redirect(route('masters.masterProductSavings.index'));
        }

        return view('masters.master_product_savings.edit')->with('masterProductSavings', $masterProductSavings);
    }

    /**
     * Update the specified MasterProductSavings in storage.
     *
     * @param int $id
     * @param UpdateMasterProductSavingsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterProductSavingsRequest $request)
    {
        $masterProductSavings = $this->masterProductSavingsRepository->find($id);

        if (empty($masterProductSavings)) {
            Flash::error('Master Product Savings not found');

            return redirect(route('masters.masterProductSavings.index'));
        }

        $masterProductSavings = $this->masterProductSavingsRepository->update($request->all(), $id);

        Flash::success('Master Product Savings updated successfully.');

        return redirect(route('masters.masterProductSavings.index'));
    }

    /**
     * Remove the specified MasterProductSavings from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterProductSavings = $this->masterProductSavingsRepository->find($id);

        if (empty($masterProductSavings)) {
            Flash::error('Master Product Savings not found');

            return redirect(route('masters.masterProductSavings.index'));
        }

        $this->masterProductSavingsRepository->delete($id);

        Flash::success('Master Product Savings deleted successfully.');

        return redirect(route('masters.masterProductSavings.index'));
    }
}
