<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterCurrenciesRequest;
use App\Http\Requests\Masters\UpdateMasterCurrenciesRequest;
use App\Repositories\Masters\MasterCurrenciesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterCurrenciesController extends AppBaseController
{
    /** @var  MasterCurrenciesRepository */
    private $masterCurrenciesRepository;

    public function __construct(MasterCurrenciesRepository $masterCurrenciesRepo)
    {
        $this->masterCurrenciesRepository = $masterCurrenciesRepo;
    }

    /**
     * Display a listing of the MasterCurrencies.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterCurrencies = $this->masterCurrenciesRepository->paginate(20);

        return view('masters.master_currencies.index')
            ->with('masterCurrencies', $masterCurrencies);
    }

    /**
     * Show the form for creating a new MasterCurrencies.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_currencies.create');
    }

    /**
     * Store a newly created MasterCurrencies in storage.
     *
     * @param CreateMasterCurrenciesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterCurrenciesRequest $request)
    {
        $input = $request->all();

        $masterCurrencies = $this->masterCurrenciesRepository->create($input);

        Flash::success('Master Currencies saved successfully.');

        return redirect(route('masters.masterCurrencies.index'));
    }

    /**
     * Display the specified MasterCurrencies.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterCurrencies = $this->masterCurrenciesRepository->find($id);

        if (empty($masterCurrencies)) {
            Flash::error('Master Currencies not found');

            return redirect(route('masters.masterCurrencies.index'));
        }

        return view('masters.master_currencies.show')->with('masterCurrencies', $masterCurrencies);
    }

    /**
     * Show the form for editing the specified MasterCurrencies.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterCurrencies = $this->masterCurrenciesRepository->find($id);

        if (empty($masterCurrencies)) {
            Flash::error('Master Currencies not found');

            return redirect(route('masters.masterCurrencies.index'));
        }

        return view('masters.master_currencies.edit')->with('masterCurrencies', $masterCurrencies);
    }

    /**
     * Update the specified MasterCurrencies in storage.
     *
     * @param int $id
     * @param UpdateMasterCurrenciesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterCurrenciesRequest $request)
    {
        $masterCurrencies = $this->masterCurrenciesRepository->find($id);

        if (empty($masterCurrencies)) {
            Flash::error('Master Currencies not found');

            return redirect(route('masters.masterCurrencies.index'));
        }

        $masterCurrencies = $this->masterCurrenciesRepository->update($request->all(), $id);

        Flash::success('Master Currencies updated successfully.');

        return redirect(route('masters.masterCurrencies.index'));
    }

    /**
     * Remove the specified MasterCurrencies from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterCurrencies = $this->masterCurrenciesRepository->find($id);

        if (empty($masterCurrencies)) {
            Flash::error('Master Currencies not found');

            return redirect(route('masters.masterCurrencies.index'));
        }

        $this->masterCurrenciesRepository->delete($id);

        Flash::success('Master Currencies deleted successfully.');

        return redirect(route('masters.masterCurrencies.index'));
    }
}
