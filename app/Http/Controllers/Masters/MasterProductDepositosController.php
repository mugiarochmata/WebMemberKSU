<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterProductDepositosRequest;
use App\Http\Requests\Masters\UpdateMasterProductDepositosRequest;
use App\Repositories\Masters\MasterProductDepositosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterProductDepositosController extends AppBaseController
{
    /** @var  MasterProductDepositosRepository */
    private $masterProductDepositosRepository;

    public function __construct(MasterProductDepositosRepository $masterProductDepositosRepo)
    {
        $this->masterProductDepositosRepository = $masterProductDepositosRepo;
    }

    /**
     * Display a listing of the MasterProductDepositos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterProductDepositos = $this->masterProductDepositosRepository->paginate(20);

        return view('masters.master_product_depositos.index')
            ->with('masterProductDepositos', $masterProductDepositos);
    }

    /**
     * Show the form for creating a new MasterProductDepositos.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_product_depositos.create');
    }

    /**
     * Store a newly created MasterProductDepositos in storage.
     *
     * @param CreateMasterProductDepositosRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterProductDepositosRequest $request)
    {
        $input = $request->all();

        $masterProductDepositos = $this->masterProductDepositosRepository->create($input);

        Flash::success('Master Product Depositos saved successfully.');

        return redirect(route('masters.masterProductDepositos.index'));
    }

    /**
     * Display the specified MasterProductDepositos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterProductDepositos = $this->masterProductDepositosRepository->find($id);

        if (empty($masterProductDepositos)) {
            Flash::error('Master Product Depositos not found');

            return redirect(route('masters.masterProductDepositos.index'));
        }

        return view('masters.master_product_depositos.show')->with('masterProductDepositos', $masterProductDepositos);
    }

    /**
     * Show the form for editing the specified MasterProductDepositos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterProductDepositos = $this->masterProductDepositosRepository->find($id);

        if (empty($masterProductDepositos)) {
            Flash::error('Master Product Depositos not found');

            return redirect(route('masters.masterProductDepositos.index'));
        }

        return view('masters.master_product_depositos.edit')->with('masterProductDepositos', $masterProductDepositos);
    }

    /**
     * Update the specified MasterProductDepositos in storage.
     *
     * @param int $id
     * @param UpdateMasterProductDepositosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterProductDepositosRequest $request)
    {
        $masterProductDepositos = $this->masterProductDepositosRepository->find($id);

        if (empty($masterProductDepositos)) {
            Flash::error('Master Product Depositos not found');

            return redirect(route('masters.masterProductDepositos.index'));
        }

        $masterProductDepositos = $this->masterProductDepositosRepository->update($request->all(), $id);

        Flash::success('Master Product Depositos updated successfully.');

        return redirect(route('masters.masterProductDepositos.index'));
    }

    /**
     * Remove the specified MasterProductDepositos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterProductDepositos = $this->masterProductDepositosRepository->find($id);

        if (empty($masterProductDepositos)) {
            Flash::error('Master Product Depositos not found');

            return redirect(route('masters.masterProductDepositos.index'));
        }

        $this->masterProductDepositosRepository->delete($id);

        Flash::success('Master Product Depositos deleted successfully.');

        return redirect(route('masters.masterProductDepositos.index'));
    }
}
