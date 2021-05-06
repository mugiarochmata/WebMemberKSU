<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterCompaniesRequest;
use App\Http\Requests\Masters\UpdateMasterCompaniesRequest;
use App\Repositories\Masters\MasterCompaniesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterCompaniesController extends AppBaseController
{
    /** @var  MasterCompaniesRepository */
    private $masterCompaniesRepository;

    public function __construct(MasterCompaniesRepository $masterCompaniesRepo)
    {
        $this->masterCompaniesRepository = $masterCompaniesRepo;
    }

    /**
     * Display a listing of the MasterCompanies.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterCompanies = $this->masterCompaniesRepository->paginate(20);

        return view('masters.master_companies.index')
            ->with('masterCompanies', $masterCompanies);
    }

    /**
     * Show the form for creating a new MasterCompanies.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_companies.create');
    }

    /**
     * Store a newly created MasterCompanies in storage.
     *
     * @param CreateMasterCompaniesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterCompaniesRequest $request)
    {
        $input = $request->all();

        $masterCompanies = $this->masterCompaniesRepository->create($input);

        Flash::success('Master Companies saved successfully.');

        return redirect(route('masters.masterCompanies.index'));
    }

    /**
     * Display the specified MasterCompanies.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterCompanies = $this->masterCompaniesRepository->find($id);

        if (empty($masterCompanies)) {
            Flash::error('Master Companies not found');

            return redirect(route('masters.masterCompanies.index'));
        }

        return view('masters.master_companies.show')->with('masterCompanies', $masterCompanies);
    }

    /**
     * Show the form for editing the specified MasterCompanies.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterCompanies = $this->masterCompaniesRepository->find($id);

        if (empty($masterCompanies)) {
            Flash::error('Master Companies not found');

            return redirect(route('masters.masterCompanies.index'));
        }

        return view('masters.master_companies.edit')->with('masterCompanies', $masterCompanies);
    }

    /**
     * Update the specified MasterCompanies in storage.
     *
     * @param int $id
     * @param UpdateMasterCompaniesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterCompaniesRequest $request)
    {
        $masterCompanies = $this->masterCompaniesRepository->find($id);

        if (empty($masterCompanies)) {
            Flash::error('Master Companies not found');

            return redirect(route('masters.masterCompanies.index'));
        }

        $masterCompanies = $this->masterCompaniesRepository->update($request->all(), $id);

        Flash::success('Master Companies updated successfully.');

        return redirect(route('masters.masterCompanies.index'));
    }

    /**
     * Remove the specified MasterCompanies from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterCompanies = $this->masterCompaniesRepository->find($id);

        if (empty($masterCompanies)) {
            Flash::error('Master Companies not found');

            return redirect(route('masters.masterCompanies.index'));
        }

        $this->masterCompaniesRepository->delete($id);

        Flash::success('Master Companies deleted successfully.');

        return redirect(route('masters.masterCompanies.index'));
    }
}
