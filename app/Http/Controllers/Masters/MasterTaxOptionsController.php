<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterTaxOptionsRequest;
use App\Http\Requests\Masters\UpdateMasterTaxOptionsRequest;
use App\Repositories\Masters\MasterTaxOptionsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterTaxOptionsController extends AppBaseController
{
    /** @var  MasterTaxOptionsRepository */
    private $masterTaxOptionsRepository;

    public function __construct(MasterTaxOptionsRepository $masterTaxOptionsRepo)
    {
        $this->masterTaxOptionsRepository = $masterTaxOptionsRepo;
    }

    /**
     * Display a listing of the MasterTaxOptions.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterTaxOptions = $this->masterTaxOptionsRepository->paginate(20);

        return view('masters.master_tax_options.index')
            ->with('masterTaxOptions', $masterTaxOptions);
    }

    /**
     * Show the form for creating a new MasterTaxOptions.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_tax_options.create');
    }

    /**
     * Store a newly created MasterTaxOptions in storage.
     *
     * @param CreateMasterTaxOptionsRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterTaxOptionsRequest $request)
    {
        $input = $request->all();

        $masterTaxOptions = $this->masterTaxOptionsRepository->create($input);

        Flash::success('Master Tax Options saved successfully.');

        return redirect(route('masters.masterTaxOptions.index'));
    }

    /**
     * Display the specified MasterTaxOptions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterTaxOptions = $this->masterTaxOptionsRepository->find($id);

        if (empty($masterTaxOptions)) {
            Flash::error('Master Tax Options not found');

            return redirect(route('masters.masterTaxOptions.index'));
        }

        return view('masters.master_tax_options.show')->with('masterTaxOptions', $masterTaxOptions);
    }

    /**
     * Show the form for editing the specified MasterTaxOptions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterTaxOptions = $this->masterTaxOptionsRepository->find($id);

        if (empty($masterTaxOptions)) {
            Flash::error('Master Tax Options not found');

            return redirect(route('masters.masterTaxOptions.index'));
        }

        return view('masters.master_tax_options.edit')->with('masterTaxOptions', $masterTaxOptions);
    }

    /**
     * Update the specified MasterTaxOptions in storage.
     *
     * @param int $id
     * @param UpdateMasterTaxOptionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterTaxOptionsRequest $request)
    {
        $masterTaxOptions = $this->masterTaxOptionsRepository->find($id);

        if (empty($masterTaxOptions)) {
            Flash::error('Master Tax Options not found');

            return redirect(route('masters.masterTaxOptions.index'));
        }

        $masterTaxOptions = $this->masterTaxOptionsRepository->update($request->all(), $id);

        Flash::success('Master Tax Options updated successfully.');

        return redirect(route('masters.masterTaxOptions.index'));
    }

    /**
     * Remove the specified MasterTaxOptions from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterTaxOptions = $this->masterTaxOptionsRepository->find($id);

        if (empty($masterTaxOptions)) {
            Flash::error('Master Tax Options not found');

            return redirect(route('masters.masterTaxOptions.index'));
        }

        $this->masterTaxOptionsRepository->delete($id);

        Flash::success('Master Tax Options deleted successfully.');

        return redirect(route('masters.masterTaxOptions.index'));
    }
}
