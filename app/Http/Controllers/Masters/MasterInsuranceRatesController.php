<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterInsuranceRatesRequest;
use App\Http\Requests\Masters\UpdateMasterInsuranceRatesRequest;
use App\Repositories\Masters\MasterInsuranceRatesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterInsuranceRatesController extends AppBaseController
{
    /** @var  MasterInsuranceRatesRepository */
    private $masterInsuranceRatesRepository;

    public function __construct(MasterInsuranceRatesRepository $masterInsuranceRatesRepo)
    {
        $this->masterInsuranceRatesRepository = $masterInsuranceRatesRepo;
    }

    /**
     * Display a listing of the MasterInsuranceRates.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterInsuranceRates = $this->masterInsuranceRatesRepository->paginate(20);

        return view('masters.master_insurance_rates.index')
            ->with('masterInsuranceRates', $masterInsuranceRates);
    }

    /**
     * Show the form for creating a new MasterInsuranceRates.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_insurance_rates.create');
    }

    /**
     * Store a newly created MasterInsuranceRates in storage.
     *
     * @param CreateMasterInsuranceRatesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterInsuranceRatesRequest $request)
    {
        $input = $request->all();

        $masterInsuranceRates = $this->masterInsuranceRatesRepository->create($input);

        Flash::success('Master Insurance Rates saved successfully.');

        return redirect(route('masters.masterInsuranceRates.index'));
    }

    /**
     * Display the specified MasterInsuranceRates.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterInsuranceRates = $this->masterInsuranceRatesRepository->find($id);

        if (empty($masterInsuranceRates)) {
            Flash::error('Master Insurance Rates not found');

            return redirect(route('masters.masterInsuranceRates.index'));
        }

        return view('masters.master_insurance_rates.show')->with('masterInsuranceRates', $masterInsuranceRates);
    }

    /**
     * Show the form for editing the specified MasterInsuranceRates.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterInsuranceRates = $this->masterInsuranceRatesRepository->find($id);

        if (empty($masterInsuranceRates)) {
            Flash::error('Master Insurance Rates not found');

            return redirect(route('masters.masterInsuranceRates.index'));
        }

        return view('masters.master_insurance_rates.edit')->with('masterInsuranceRates', $masterInsuranceRates);
    }

    /**
     * Update the specified MasterInsuranceRates in storage.
     *
     * @param int $id
     * @param UpdateMasterInsuranceRatesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterInsuranceRatesRequest $request)
    {
        $masterInsuranceRates = $this->masterInsuranceRatesRepository->find($id);

        if (empty($masterInsuranceRates)) {
            Flash::error('Master Insurance Rates not found');

            return redirect(route('masters.masterInsuranceRates.index'));
        }

        $masterInsuranceRates = $this->masterInsuranceRatesRepository->update($request->all(), $id);

        Flash::success('Master Insurance Rates updated successfully.');

        return redirect(route('masters.masterInsuranceRates.index'));
    }

    /**
     * Remove the specified MasterInsuranceRates from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterInsuranceRates = $this->masterInsuranceRatesRepository->find($id);

        if (empty($masterInsuranceRates)) {
            Flash::error('Master Insurance Rates not found');

            return redirect(route('masters.masterInsuranceRates.index'));
        }

        $this->masterInsuranceRatesRepository->delete($id);

        Flash::success('Master Insurance Rates deleted successfully.');

        return redirect(route('masters.masterInsuranceRates.index'));
    }
}
